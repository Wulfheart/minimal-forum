<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): ApplicationContract|Factory|View|Application
    {
        //
    }
}
