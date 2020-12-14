<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('createSuccess', function($data) {
            return Response::json($data, 201);
        });

        Response::macro('getSuccess', function($data) {
            return Response::json($data, 200);
        });

        Response::macro('error', function($message) {
            return Response::json(
                [
                    'message'=> $message
                ], 400
            );
        }) ;
    }
}
