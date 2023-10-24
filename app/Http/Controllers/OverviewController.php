<?php

namespace App\Http\Controllers;

use App\Service\OverviewDataService;
use App\ViewData\Shared\Color;
use App\ViewData\Structure\Channel;
use App\ViewData\Structure\Hub;
use App\ViewData\Structure\Item;
use App\ViewData\Structure\Navigation;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function __construct(
        //        private OverviewDataService $viewDataService
    ) {

    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): ApplicationContract|Factory|View|Application
    {
        //        $data = $this->viewDataService->getOverviewDataForUser($request->user());

        $sidebar = new Navigation(
            [
                new Item(
                    'Alle Diskussionen',
                    '#',
                    false,
                    'far fa-comments'
                ),
                new Item(
                    'Beobachtete Diskussionen',
                    '#',
                    false,
                    'far fa-eye'
                )
            ],
            [
                new Hub(
                    'DNW',
                    Color::fromHex('#dc2626'),
                    '#',
                    false,
                    [
                        new Channel(
                            'General',
                            Color::fromHex('#b91c1c'),
                            '#',
                            false,
                            'fas fa-heart'
                        ),
                        new Channel(
                            'General2',
                            Color::fromHex('#7f1d1d'),
                            '#',
                            false,
                            'fas fa-heart'
                        ),
                        new Channel(
                            'General3',
                            Color::fromHex('#fca5a5'),
                            '#',
                            false,
                            'fas fa-heart'
                        ),
                    ]
                ),
                new Hub(
                    'Diplomacy Generell',
                    Color::fromHex('#84cc16'),
                    '#',
                    false,
                    [
                        new Channel(
                            'General',
                            Color::fromHex('#4d7c0f'),
                            '#',
                            false,
                            'fas fa-vial'
                        ),
                        new Channel(
                            'General2',
                            Color::fromHex('#bef264'),
                            '#',
                            false,
                            'fas fa-heart'
                        ),
                        new Channel(
                            'General3',
                            Color::fromHex('#4d7c0f'),
                            '#',
                            false,
                            'fas fa-heart'
                        ),
                    ]
                ),
            ],
            true,
            false,
            false
        );

        return view('main', [
            'sidebar' => $sidebar,
        ]);
    }
}
