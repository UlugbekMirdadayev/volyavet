<x-filament::page>
    <x-filament::card>
        <x-slot name="header">
            <h2>{{ $title ?? "Редактирование Политика конфиденциальности" }}</h2>
        </x-slot>


        <textarea wire:model="fileContent" rows="12" class="filament-forms-textarea-component filament-forms-input block w-full transition duration-75 rounded-lg shadow-sm outline-none focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-500 disabled:opacity-70 border-gray-300" style="background:none!important;"></textarea>
        <x-slot name="footer">
            <x-filament::button wire:click="saveFile" color="primary">Сохранить</x-filament::button>
        </x-slot>
    </x-filament::card>
</x-filament::page>
