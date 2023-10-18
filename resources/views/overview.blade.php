<x-layouts.app>
    <main>
        <h1>{{ $data->title }}</h1>
        <table>
            <thead>
                <tr>
                    <th class="grow">Forum</th>
                    <th>Topics</th>
                    <th>Posts</th>
                    <th>Letzte&nbsp;Aktivität</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->hubs as $hub)
                    <tr class="forum">
                        <td colspan="4">
                            <b>{{ $hub->title }}</b>
                        </td>
                    </tr>
                    @foreach ($hub->channels as $channel)
                        <tr>
                            <td>
                                <a href="{{ $channel->link }}">{{ $channel->title }}</a>
                                <br>
                                {{ $channel->description }}
                            </td>
                            <td class="center">{{ $channel->numberOfTopics }}</td>
                            <td class="center">{{ $channel->numberOfPosts }}</td>
                            <td class="center">
                                <a href="{{ $channel->latestPost->postedAt }}">{{ $channel->latestPost->postedAt }}</a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>

        </table>
        <a href="{{ route('channel') }}">Channel</a>
    </main>

</x-layouts.app>
