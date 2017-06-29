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

    /**
     * @param $entity
     * @param $msg
     * @param $errorType
     * @return bool
     * Checking if entity exists --> if not, set session flash variables for errors and errorClass to display
     * to admin
     */
    public function checkIfEntityExists($entity, $msg, $errorType)
    {
        if (!$entity) { // if entity is null or false
            Session::flash('error', $msg); // set message for error
            Session::flash('errorClass', $errorType); // set class for error display
            return false; // return true or false for redirection
        }
        return true;
    }

    /**
     * @param $url
     * @return mixed
     * get embed url from youtube video in media uploading --> edit/add post backoffice
     */
    protected function getEmbedUrl($url)
    {
        return str_replace('watch?v=', 'embed/', $url);
    }
}
