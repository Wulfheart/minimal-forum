<x-layouts.app x-data="{ showTextarea: false }">
    <x-nav></x-nav>
    <div class="w-full bg-[--color-accent]"
         style="--color-accent: {{ $channel->channelColor->hexValue() }}; --color-contrast: {{ $channel->channelColor->getContrastColor()->hexValue() }}">
        <x-container class="px-4 pb-7 pt-10">
            <div class="w-full text-center">
                <div class="flex flex-row justify-center space-x-5 text-sm font-semibold">
                    <a href="#">
                        <div class="rounded bg-[--color-contrast] px-2 py-0.5 text-[--color-accent]">
                            {{ $channel->hubTitle }}
                        </div>
                    </a>
                    <a href="#">
                        <div class="px-2 py-0.5 text-[--color-contrast]">
                            <i class="{{ $channel->channelIcon }} mr-1"></i>
                            {{ $channel->channelTitle }}
                        </div>
                    </a>

                </div>
                <h1 class="pt-4 text-xl text-[--color-contrast] md:text-2xl">
                    {{ $title }}
                </h1>
            </div>
        </x-container>
    </div>
    <x-container class="border-b py-4 md:hidden">
        <div>
            <x-button class="mr-2 bg-primary font-bold text-primary-contrast hover:bg-primary-dark" x-on:click="showTextarea = true; $nextTick(() => $refs.textArea.focus())">
                Antworten
            </x-button>
            <x-button>
                <i class="fa fa-eye mr-2"></i>
                Beobachten
            </x-button>
        </div>
    </x-container>

    <x-container class="">
        <div class="flex flex-row">
            <div class="min-w-0 max-w-[45rem] flex-shrink">
                @foreach ($posts as $post)
                    <div class="mx-auto max-w-full flex-shrink overflow-x-auto border-b py-5">
                        <div class="mb-4 ml-1 flex flex-row text-sm">
                            <div class="mr-2 font-bold">
                                {{ $post->author }}
                            </div>
                            <div class="text-gray-500">
                                {{ $post->postedAt }}
                            </div>
                        </div>
                        <div class="prose prose-sm ml-[2rem] max-w-none md:ml-[4rem]">
                            {!! $post->content !!}
                        </div>
                    </div>
                @endforeach
                <div class="w-full py-5" id="reply">
                    <div class="w-full rounded border-2 border-dashed border-gray-300" x-show="! showTextarea">
                        <button class="w-full p-5 text-left text-gray-500"
                                x-on:click="showTextarea = true; $nextTick(() => $refs.textArea.focus())">
                            Antwort verfassen
                        </button>
                    </div>
                    <form x-cloak
                          x-show="showTextarea">
                        <textarea name="reply-content" rows="7" x-ref="textArea"
                                  class="form-textarea w-full rounded border border-gray-300 text-sm text-gray-700 focus:border-primary"></textarea>
                        <div class="flex w-full flex-row justify-end pt-3">
                            <div>
                                <x-button class="bg-primary font-bold text-primary-contrast hover:bg-primary-dark">
                                    Speichern
                                </x-button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="ml-4 hidden py-5 md:block">
                <x-button
                          x-on:click="showTextarea = true; $nextTick(() => $refs.textArea.focus())"
                          class="mr-2 w-full bg-primary font-bold text-primary-contrast hover:bg-primary-dark">
                    Antworten
                </x-button>
                <x-button class="mt-4 w-full">
                    <i class="far fa-eye mr-2"></i>
                    Beobachten
                </x-button>
            </div>
        </div>

    </x-container>

</x-layouts.app>
