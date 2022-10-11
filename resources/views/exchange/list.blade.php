<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__("User Currency Searches")}}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>start Date</th>
                            <th>end Date</th>
                            <th>Currency</th>
                            <th>Avg Rate</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($userRates as $currencyRate)

                            <tr>
                                <td>{{$currencyRate->start_date}}</td>
                                <td>{{$currencyRate->end_date}}</td>
                                <td>{{$currencyRate->currency}}</td>
                                <td>{{$currencyRate->avg}}</td>
                                <td>
                                    <form method="POST" action="{{ route('currency-exchange.destroy', ["currency_exchange"=>$currencyRate->id]) }}">
                                    @csrf
                                    @method("DELETE")
                                        <input type="submit" class="btn btn-danger" value="DELETE">
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
