<?php

namespace App\Tools;

use App\Parameters\SearchParameter;
use Illuminate\Http\Request;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * SmartResponse
 */
class SmartResponse
{
    private $draw = null;
    private $code = 200;
    private $message;
    private $data = [];
    private $view = null;
    private $redirect = null;
    private $recordsFiltered = null;
    private $recordsTotal = null;
    private $perPage = null;
    private $currentPage = null;
    private $lastPage = null;

    /**
     * Set the value of draw
     * @param int $data
     */
    public function setDraw(int $data): void
    {
        $this->draw = $data;
    }

    /**
     * Set the value of code
     * @param int $data
     */
    public function setCode(int $data): void
    {
        $this->code = $data;
    }

    /**
     * Set the value of message
     * @param string $data
     */
    public function setMessage(string $data): void
    {
        $this->message = $data;
    }

    /**
     * Set the value of data
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * Set the value of view
     * @param string $data
     */
    public function setView(string $data): void
    {
        $this->view = $data;
    }

    /**
     * Set the value of redirect
     * @param string $data
     */
    public function setRedirect(string $data): void
    {
        $this->redirect = $data;
    }

    /**
     * Set the value of recordsFiltered
     * @param int $data
     */
    public function setRecordsFiltered(int $data): void
    {
        $this->recordsFiltered = $data;
    }

    /**
     * Set the value of recordsTotal
     * @param int $data
     */
    public function setRecordsTotal(int $data): void
    {
        $this->recordsTotal = $data;
    }

    /**
     * Set the value of perPage
     * @param int $data
     */
    public function setPerPage(int $data): void
    {
        $this->perPage = $data;
    }

    /**
     * Set the value of currentPage
     * @param int $data
     */
    public function setCurrentPage(int $data): void
    {
        $this->currentPage = $data;
    }

    /**
     * Set the value of lastPage
     * @param int $data
     */
    public function setLastPage(int $data): void
    {
        $this->lastPage = $data;
    }

    /**
     * Set all pagination attributes
     */
    public function setPagination(int $recordsTotal, int $recordsFiltered, int $perPage, int $currentPage)
    {
        $this->setRecordsFiltered($recordsFiltered);
        $this->setRecordsTotal($recordsTotal);
        $this->setPerPage($perPage);
        $this->setCurrentPage($currentPage);
        $this->setLastPage(max(ceil($recordsFiltered/$perPage), 1));
    }


    public function render($forceJson = false, $renderViewAsJson = false)
    {
        if (request()->wantsJson() || $forceJson) {
            return $this->renderJson($renderViewAsJson);
        } elseif (! is_null($this->redirect)) {
            return $this->renderRedirect();
        } else {
            return $this->renderHtml();
        }
    }

    public function renderJson($renderViewAsJson = false)
    {
        if (is_null($this->data)) {
            $this->data = [];
        }

        $json = [];

        if (! is_null($this->draw)) {
            $json['draw'] = $this->draw;
        }

        if (! is_null($this->code)) {
            $json['code'] = $this->code;
        }

        if (! is_null($this->message)) {
            $json['message'] = $this->message;
        }

        if ($renderViewAsJson === true && $this->view != null && view()->exists($this->view)) {
            $json['data'] = view($this->view, $this->data)->render();
        } else {
            $json['data'] = $this->data;
        }

        if (! is_null($this->recordsFiltered)) {
            $json['pagination']['recordsFiltered'] = $this->recordsFiltered;
        }

        if (! is_null($this->recordsTotal)) {
            $json['pagination']['recordsTotal'] = $this->recordsTotal;
        }

        if (! is_null($this->perPage)) {
            $json['pagination']['perPage'] = $this->perPage;
        }

        if (! is_null($this->currentPage)) {
            $json['pagination']['currentPage'] = $this->currentPage;
        }

        if (! is_null($this->lastPage)) {
            $json['pagination']['lastPage'] = $this->lastPage;
        }

        return response()->json($json, $this->code);
    }

    public function renderHtml()
    {
        if (is_null($this->data)) {
            $this->data = [];
        }

        if ($this->view == null) {
            return abort(503, 'View has not specified.');
        } elseif (! view()->exists($this->view)) {
            return abort(404);
        } else {
            return view($this->view, $this->data);
        }
    }

    public function renderRedirect()
    {
        if ($this->redirect == '') {
            return redirect()
                ->back()
                ->withInput()
                ->with($this->data);
        } else {
            return redirect($this->redirect)
                ->withInput()
                ->with($this->data);
        }
    }
}
