<div {{ $attributes->class(['mx-auto max-w-full px-4 sm:px-6 lg:px-8']) }}>
    <!-- We've used 3xl here, but feel free to try other max-widths based on your needs -->
    <div class="mx-auto max-w-[962px]">
        {{ $slot }}
    </div>
</div>
