<x-filament::page>


    <x-filament::card>
{{--        <x-slot name="header">--}}
{{--            <h2>{{ $this->title ?? "Редактирование " . $this->data['name'] }}</h2>--}}
{{--        </x-slot>--}}
        <x-filament::form wire:submit="save">
            {{ $this->form }}

            <x-filament::card header="Мед карта">
                @php


                    $vet = new \App\Services\VetService();
                    if ($this->data['crm_user_id'] > 0) {
                        $vt = $vet->medCardByClientId($this->data['crm_user_id']);
                    }

                @endphp
                @if(isset($vt['data']['medicalcards']))
                    @foreach ($vt['data']['medicalcards'] as $g)
                        <x-filament::card>

                            ID Медкарты: {{$g['medical_card_id']}} <br>
                            ID Владельца: {{$g['client_id']}} <br>
                            ФИО Владельца: {{$g['last_name']}} {{$g['first_name']}} {{$g['middle_name']}} <br>
                            ФИО
                            Врача: {{$g['doctor_last_name']}} {{$g['doctor_first_name']}} {{$g['doctor_middle_name']}}
                            <br>

                            Причины обращение к врачу: {{$g['admission_type_title']}} <br>

                            Лечение: {!!  $g['healing_process']!!} <br>
                            Рекомендации: {!!$g['recomendation']!!} <br>
                            <div>
                                <p>Питомец</p>
                                <ul>
                                    <li>- ID питомца: {{$g['pet_id']}}</li>
                                    <li>- Прозвище: {{$g['alias']}}</li>
                                    <li>- Пол: {{\App\Enums\PetSexStatusEnum::getStatus($g['sex'])}}</li>
                                    <li>- Порода: {{$g['breed']}}</li>
                                    <li>- Вес: {{$g['weight']}}</li>
                                </ul>
                            </div>

                        </x-filament::card>
                    @endforeach
                @endif

            </x-filament::card>


            <x-filament::form.actions
                :actions="$this->getCachedFormActions()"
                :full-width="$this->hasFullWidthFormActions()"
            />
        </x-filament::form>
        @if (count($relationManagers = $this->getRelationManagers()))
            <x-filament::resources.relation-managers
                :active-manager="$activeRelationManager"
                :managers="$relationManagers"
                :owner-record="$record"
                :page-class="static::class"
            />
        @endif
    </x-filament::card>
</x-filament::page>
