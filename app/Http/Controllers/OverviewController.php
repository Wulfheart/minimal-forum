<?php

namespace App\Http\Controllers;

use App\ViewData\Overview\OverviewViewData;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): ApplicationContract|Factory|View|Application
    {
        $data = new OverviewViewData(
            "DNW Forum",
            [
                new \App\ViewData\Overview\Hub(
                    "General",
                    "General discussion",
                    [
                        new \App\ViewData\Overview\Channel(
                            "General",
                            "General discussion",
                            "https://example.com",
                            new \App\ViewData\Overview\PostPreview(
                                "https://example.com",
                                "Hello world",
                                new \App\ViewData\Shared\Author(
                                    "John Doe",
                                    "https://example.com",
                                ),
                                "2021-01-01",
                            ),
                            1,
                            1,
                        ),
                    ],
                ),
            ]
        );
        return view('overview', [
            'data' => $data
        ]);
    }
}
