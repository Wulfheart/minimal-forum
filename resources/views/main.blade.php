<x-layouts.app>
    <x-nav>
        <x-slot:sidebar><x-sidebar :sidebar="$sidebar" suppress-follow-button
                suppress-start-discussion-button></x-sidebar></x-slot:sidebar>
    </x-nav>
    <x-container class="pt-2">
        <div class="flex w-full flex-col md:flex-row">
            <!-- Sidebar -->
            <x-sidebar :sidebar="$sidebar" class="hidden md:block"></x-sidebar>
            <!-- Main -->
            <div class="flex-grow">
                <div class="mb-4 flex w-full flex-row justify-between">
                    <x-pages.main.sort-dropdown title="Neueste">
                        <x-pages.main.sort-dropdown.item text="Neueste" />
                        <x-pages.main.sort-dropdown.item active text="Beliebteste" />
                        <x-pages.main.sort-dropdown.item text="Meiste Kommentare" />
                    </x-pages.main.sort-dropdown>
                    <x-button.icon-only><i class="fas fa-check"></i></x-button.icon-only>
                </div>

                <ul class="w-full list-none">
                    @foreach ($items as $item)
                        <x-pages.main.discussion-list-item :item="$item"></x-pages.main.discussion-list-item>
                    @endforeach
                </ul>
            </div>
        </div>
    </x-container>
</x-layouts.app>
