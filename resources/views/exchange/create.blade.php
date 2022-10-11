<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Currency Exchange Filter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('currency-exchange.store') }}">
                    @csrf

                    <!-- Name -->
                        <div class="mt-4">
                            <x-input-label for="start_date" :value="__('Start Date')" />

                            <x-date-input id="start_date" name="start_date" :value="old('start_date')" required autofocus />

                            <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="start_date" :value="__('End Date')" />

                            <x-date-input id="end_date" name="end_date" :value="old('end_date')" required autofocus />

                            <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="Currency" :value="__('Currency')" />

                            <select name="currency" class="col-md-4 form-control form-group">
                                @foreach($currencies as $currency)

                                    <option value="{{$currency->getName()}}" {{ $currency->getName() === old("currency") ? 'selected' : '' }}>
                                        {{$currency->getName()}}
                                    </option>

                                @endforeach

                            </select>

                            <x-input-error :messages="$errors->get('currency')" class="mt-2" />
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Get Results') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
