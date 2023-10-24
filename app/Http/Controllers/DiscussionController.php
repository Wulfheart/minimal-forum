<?php

namespace App\Http\Controllers;

use App\ViewData\Shared\Color;
use App\ViewData\Structure\ChannelDisplayData;
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
    public function __invoke(Request $request):  ApplicationContract|Factory|View|Application
    {
        $channelData = new ChannelDisplayData(
            'DNW',
            Color::fromHex('#0891b2'),
            'Allgemein',
            Color::fromHex('#d68b4f'),
            'fas fa-globe'
        );
        return view('discussion', [
            'channel' => $channelData,
            'title' => 'Diplomacy Meisterschaft 2023'
        ]);
    }
}
