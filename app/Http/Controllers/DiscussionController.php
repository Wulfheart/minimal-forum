<?php

namespace App\Http\Controllers;

use App\ViewData\Discussion\Post;
use App\ViewData\Shared\Color;
use App\ViewData\Structure\ChannelDisplayData;
use Bgaze\IpsumHtml\IpsumHtml;
use Bgaze\IpsumHtml\Nodes\Node;
use Bgaze\IpsumHtml\Nodes\PlainText;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): ApplicationContract|Factory|View|Application
    {
        $channelData = new ChannelDisplayData(
            'DNW',
            Color::fromHex('#d68b4f'),
            'Allgemein',
            Color::fromHex('#0891b2'),
            'fas fa-globe'
        );

        $faker = \Faker\Factory::create();

        $gen = fn() => $faker->boolean(20) ? IpsumHtml::document($faker->numberBetween(2, 10)) : IpsumHtml::random($faker->numberBetween(2, 10));


        $md = fn () => implode(
            "\n\n",
            array_filter(
                    $gen(),
                function (PlainText $n) {
                    if (!$n instanceof Node) {
                        return true;
                    }
                    return $n->getTag() !== 'img' && $n->getTag() !== 'figure';
                }
            )
        );

        $post = fn () => new Post(
            $faker->numberBetween(),
            $faker->name,
            (new Carbon($faker->dateTimeBetween('-1 year')->format('d.m.Y H:i')))->diffForHumans(),
            $md()
        );


        $posts = array_map($post, range(1, 1));

        return view('discussion', [
            'channel' => $channelData,
            'title' => 'Diplomacy Meisterschaft 2023',
            'posts' => $posts,
        ]);
    }
}
