<?php

namespace App\Http\Controllers;

use App\Service\OverviewDataService;
use App\ViewData\Overview\OverviewViewData;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function __construct(
        private OverviewDataService $viewDataService
    ) {

    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): ApplicationContract|Factory|View|Application
    {
        $data = $this->viewDataService->getOverviewDataForUser($request->user());

        return view('overview', [
            'data' => $data
        ]);
    }
}
