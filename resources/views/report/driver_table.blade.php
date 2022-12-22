<div class="table-responsive text-nowrap">
    <table class="table table-hover table-bordered" style="font-size: 12px; padding: 5px">
        <thead class="table-darak">
            <tr> 
                <th colspan="2"></th> 
                <th colspan="7" class="text-center">Transactions</th> 
            </tr>
             <tr>
                <th>S/N</th>
                <th>Date</th>
                <th>Type</th>

                <th>Driver</th>
                <th>Cashier</th>
                <th>Terminal</th>
                <th>Tickets (&#8358;)</th>
                <th>Item</th>
                <th>Amount (&#8358;)</th>

                
            </tr>


        </thead>
        <tbody class="table-border-bottom-0">
            @php
                 $total_sales = 0;
                 $total_expenses = 0;
            @endphp
            @foreach ($dates as $key => $date)
                <tr class="table-success">
                    @php
                        $sales = App\Models\Sale::where('driver_id',@$driver_id)->where('date',$date->date)->get();
                        $expenses = App\Models\Expense::where('driver_id',@$driver_id)->where('date',$date->date)->get();
                        $sum_sales = 0;
                        $sum_expenses = 0;
                    @endphp
                   
                    @foreach ($sales as $key2 => $sale)
                        <td class="table-success">@if($loop->first){{ $key + 1 }} @endif</td>
                        <td class="table-success">@if($loop->first) <strong>{{ \Carbon\Carbon::parse($date->date)->format('l, d F') }}</strong> @endif</td>
                        <td class="table-success">@if($loop->first) <em>Sales</em> @endif</td>
                        <td class="table-success">{{ $sale->driver->name }}</td>
                        <td class="table-success">{{ $sale->cashier->name }}</td>
                        <td class="table-success">{{ $sale->route->name }}</td>
                        <td class="table-success">{{ $sale->tickets }}</td>
                        <td class="table-success">-</td>
                        @php
                            $sum_sales += $sale->tickets*$sale->price;
                           
                        @endphp
                        <td class="table-success">{{ number_format($sale->tickets*$sale->price,0) }}</td>
                </tr>
                @endforeach
               @php
                    $total_sales += $sum_sales;
               @endphp
                <tr>
                    <td colspan=""></td>
                    <td colspan="7"></td>
                    <td><strong class="text-primary">&#8358;{{ number_format($sum_sales,0) }}</strong></td>
                </tr>

                @foreach ($expenses as $expense)
                <tr class="table-danger">
                    <td></td>
                    <td></td>
                    <td>@if($loop->first)<em>Expense</em> @endif</td>
                    <td>{{ $expense->driver->name }}</td>
                    <td>{{ $expense->cashier->name }}</td>
                    <td>-</td>
                    <td>-</td>
                    <td>{{ $expense->item->name }}</td>
                    <td>{{ number_format($expense->amount,0) }}</td>
                </tr>
                @php
                    $sum_expenses += $expense->amount;
                @endphp
                @endforeach
                @php
                     $total_expenses += $sum_expenses;
                @endphp
                <tr>
                    <td colspan=""></td>
                    <td colspan="7"></td>
                    <td><strong class="text-warning">&#8358;{{ number_format($sum_expenses,0) }}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    @php
                        $net = $sum_sales - $sum_expenses;
                    @endphp
                    <td colspan="7" class="text-center"> <strong> Net Revenue = @if($net > 1)<span class="text-success">&#8358;{{ number_format($net,0) }}<span> @else <span class="text-danger">&#8358;{{ number_format($net,0) }}<span> @endif</strong></td>
                </tr>
                
            @endforeach
            <tr class="table-primary">
                <td></td>
                <td></td>
                <td colspan="7" class="text-center"> <strong> Total Revenue = &#8358;{{ number_format($total_sales,0) }} Total Expense = &#8358;{{ number_format($total_expenses,0) }}</strong></td>
            </tr>
        </tbody>
    </table>
</div>