<?php

namespace App\Http\Controllers;

use App\ViewData\Discussion\ListItem;
use App\ViewData\Shared\Color;
use App\ViewData\Structure\Channel;
use App\ViewData\Structure\ChannelPill;
use App\ViewData\Structure\Hub;
use App\ViewData\Structure\Item;
use App\ViewData\Structure\Navigation;
use Carbon\Carbon;
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
                ),
                new Item(
                    'Ungelesene Diskussionen',
                    '#',
                    false,
                    'far fa-comment'
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

        $faker = \Faker\Factory::create();

        $genRandom = fn() => new ListItem(
            $faker->randomNumber(),
            $faker->text($faker->numberBetween(10, 150)),
            '#',
            new ChannelPill(
                'enim',
                Color::fromHex($faker->hexColor()),
                'consequatur',
                Color::fromHex($faker->hexColor()),
                'fas fa-heart'
            ),
            $faker->name(),
            (new Carbon($faker->dateTimeInInterval('now', '-5 days')->format('d.m.Y H:i')))->diffForHumans(),
            $faker->boolean(),
            $faker->numberBetween(0, 100),
            $faker->boolean()
        );

        $discussionItems = [
            new ListItem(
                $faker->randomNumber(),
                $faker->text(12),
                '#',
                new ChannelPill(
                    $faker->word(),
                    Color::fromHex($faker->hexColor()),
                    $faker->word(),
                    Color::fromHex($faker->hexColor()),
                    'fas fa-heart'
                ),
                $faker->name(),
                $faker->dateTime()->format('d.m.Y H:i'),
                false,
                $faker->numberBetween(0, 100),
                true
            ),
            new ListItem(
                $faker->randomNumber(),
                $faker->text(5),
                '#',
                new ChannelPill(
                    'sdföjghlksjölkjhsdfg',
                    Color::fromHex($faker->hexColor()),
                    'lksjdfghlksjfdgfh',
                    Color::fromHex($faker->hexColor()),
                    'fas fa-heart'
                ),
                $faker->name(),
                $faker->dateTime()->format('d.m.Y H:i'),
                true,
                $faker->numberBetween(0, 100),
                false
            )
        ];

        for ($i = 0; $i < 10; $i++) {
            $discussionItems[] = $genRandom();
        }

        return view('main', [
            'sidebar' => $sidebar,
            'items' => $discussionItems,
        ]);
    }
}
