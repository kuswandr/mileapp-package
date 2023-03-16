<?php

namespace App\Http\Controllers;

use App\Tools\SmartResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $smartResponse;
    public function __construct(
        SmartResponse $smartResponse
    ) {
        $this->smartResponse = $smartResponse;
    }
}
