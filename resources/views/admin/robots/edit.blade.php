@extends('filament::layouts.app')

@section('content')
    <x-filament::card>
        <x-slot name="header">
            <h2>{{ $title }}</h2>
        </x-slot>

        <x-slot name="content">
            <x-filament::code-editor
                :id="$getId()"
                :label="$getLabel()"
                :label-sr-only="$isLabelHidden()"
                :helper-text="$getHelperText()"
                :hint="$getHint()"
                :hint-icon="$getHintIcon()"
                :required="$isRequired()"
                :state-path="$getStatePath()"
            />
        </x-slot>

        <x-slot name="footer">
            <x-filament::button wire:click="saveFile" color="primary">@lang('filament::forms.save')</x-filament::button>
        </x-slot>
    </x-filament::card>
@endsection
