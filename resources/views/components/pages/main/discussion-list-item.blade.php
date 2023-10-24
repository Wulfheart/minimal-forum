@props(['item'])
<?php
/** @var \App\ViewData\Discussion\ListItem $item */
?>

<li
    class="{{ $item->isUnread ? 'text-gray-900' : 'text-gray-500' }} -mx-3 flex flex-row items-center rounded px-3 py-3 @container hover:bg-gray-100">
    <a href="#" class="mr-4 hidden flex-shrink-0">
        <div>
            <img src="https://i.pravatar.cc/150?u=fake@pravatar.com" alt="" class="h-9 w-9 rounded-full">
        </div>
    </a>
    <a href="#" class="flex flex-grow flex-row items-baseline justify-between">
        <div>
            <h2 @class(['mb-1', 'font-bold' => $item->isUnread])>
                {{ $item->title }}
            </h2>
            <div class="flex flex-row items-center text-xs">
                <div class="mr-1 text-[10px] leading-3 @xl:hidden">
                    <div class="flex flex-row">
                        <div class="rounded-l px-1 py-0.5 font-bold"
                            style="background: {{ $item->channelPill->hubColor->hexValue() }}; color: {{ $item->channelPill->hubColor->getContrastColor()->hexValue() }}">
                            {{ $item->channelPill->hubTitle }}
                        </div>
                        <div class="whitespace-nowrap rounded-r px-1 py-0.5 font-bold"
                            style="background: {{ $item->channelPill->channelColor->hexValue() }}; color: {{ $item->channelPill->channelColor->getContrastColor()->hexValue() }}">
                            <i class="{{ $item->channelPill->channelIcon }} mr-0.5"></i>
                            {{ $item->channelPill->channelTitle }}
                        </div>
                    </div>
                </div>
                <div class="truncate">
                    @if ($item->lastPostIsResponse)
                        <i class="fas fa-reply"></i>
                    @endif
                    <span class="font-bold">{{ $item->lastAuthor }}</span> {{ $item->lastPostedAt }}
                </div>
            </div>
        </div>
        <div class="ml-5 flex flex-shrink-0 flex-row items-center">
            <div class="mr-5 hidden text-[10px] leading-3 @xl:block">
                <div>
                    <span class="rounded-l px-1 py-0.5 font-bold text-white"
                        style="background: {{ $item->channelPill->hubColor->hexValue() }}; color: {{ $item->channelPill->hubColor->getContrastColor()->hexValue() }}">
                        {{ $item->channelPill->hubTitle }}
                    </span>
                    <span class="rounded-r bg-gray-200 px-1 py-0.5 font-bold"
                        style="background: {{ $item->channelPill->channelColor->hexValue() }}; color: {{ $item->channelPill->channelColor->getContrastColor()->hexValue() }}">
                        <i class="{{ $item->channelPill->channelIcon }} mr-0.5"></i>
                        {{ $item->channelPill->channelTitle }}
                    </span>
                </div>
            </div>
            <div class="{{ $item->isUnread ? 'font-bold' : '' }} text-sm">
                <i @class([
                    'fa-comment mr-1',
                    'fas' => $item->isUnread,
                    'far' => !$item->isUnread,
                ])></i>
                {{ $item->responseCount }}
            </div>
        </div>
    </a>
</li>
