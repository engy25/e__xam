<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
///shareData in all views
    /*private $User;
    private $signed_in;*/

    public function __construct()
    {
        /*$this->middleware(function ($request, $next) {
            $this->User = Auth::User();
            $this->signed_in = Auth::check();

            view()->share('signed_in', $this->signed_in);
            view()->share('User', $this->User);

            return $next($request);
        });*/

    }

}
