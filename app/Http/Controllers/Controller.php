<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Configuracion;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    protected $currentUser;

    public function __construct()
    {
        // Grab the logged in user if any and set it to this property.
        // All extending classes should then have access to it.
        $configuraciones = Configuracion::first();

        // Share this property with all the views in your application.
        view()->share('conf', $configuraciones);
    }
}
