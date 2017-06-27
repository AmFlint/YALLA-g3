<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function checkIfEntityExists($entity, $msg, $errorType)
    {
        if (!$entity) {
            Session::flash('error', $msg);
            Session::flash('errorClass', $errorType);
            return false;
        }
        return true;
    }

    public function setLocale($locale)
    {
        dd($locale);
    }
}
