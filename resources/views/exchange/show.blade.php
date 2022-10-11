<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$currency." Rates" }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{" Avg:  ".$avg }}
            </h2>
        </x-slot>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
               <b>
                   {{$currency." Rates" }}
               </b>
            </h1>
            <br>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Rate</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($currencyRates as $date=>$currencyRate)

                            <tr>
                                <td>{{$date}}</td>
                                <td>{{$currencyRate}}</td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
