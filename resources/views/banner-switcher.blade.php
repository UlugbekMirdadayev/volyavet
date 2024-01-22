@if($currentBranch)
<div class="ml-4">
    <x-filament::dropdown>
        <x-slot name="trigger">
            <x-filament::button>
                {{ $currentBranch->title }}
            </x-filament::button>
        </x-slot>

        <x-filament::dropdown.list>
            @foreach($items as $item)
            <x-filament::dropdown.list.item href="/admin/branch/{{ $item->id }}" tag="a">
                {{$item->title}}
            </x-filament::dropdown.list.item>
            @endforeach
        </x-filament::dropdown.list>
    </x-filament::dropdown>
</div>
@endif
