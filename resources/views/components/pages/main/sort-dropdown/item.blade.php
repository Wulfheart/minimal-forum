@props(['text', 'active' => false])

<li class="text-sm">
    <a href="#">
        <div class="pl-10 pr-4 py-2 w-full hover:bg-muted-most">
            @if ($active)
                <i class="fas fa-check -ml-6 mr-2"></i>
            @endif
            {{ $text }}

        </div>
    </a>
</li>
