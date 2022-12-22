<div class="table-responsive text-nowrap">
    <table class="table table-hover table-bordered" style="font-size: 12px; padding: 5px">
        <thead>
            <tr> 
                <th colspan="2"></th> 
                <th colspan="7" class="text-center">Transactions</th> 
            </tr>
             <tr>
                <th>#</th>
                <th>Date</th>
                <th>Sales (&#8358;)</th>
                <th>Expenses (&#8358;)</th>
                <th>Commission (&#8358;)</th>
                <th>Net Revenue (&#8358;)</th>
            </tr>


        </thead>
        <tbody class="table-border-bottom-0">
            @php
                 $total_sales = 0;
                 $sum_sales = 0;
                 $total_expenses = 0;
                 $total_net = 0;
                 $total_com = 0;
            @endphp
            @foreach ($dates as $key => $date)
                <tr>
                    @php
                        $sales = App\Models\Sale::where('date',$date->date)->get();
                        $expenses = App\Models\Expense::where('date',$date->date)->sum('amount');
                    @endphp
                    @foreach ($sales as $sale)
                    @php
                         $sum_sales += $sale->tickets*$sale->price;
                    @endphp
                    @endforeach
                   

                    <td>{{ $key + 1 }}</td>
                    <td><strong>{{ \Carbon\Carbon::parse($date->date)->format('l, d F') }}</strong></td>
                
                    <td class="table-success">{{ number_format($sum_sales,0) }}</td>
                    <td class="table-danger">{{ number_format($expenses,0) }}</td>
                    @php
                        $com = $sum_sales*0.1;
                        $net = $sum_sales-$expenses-$com;
                    @endphp
                   
                    @php
                        $total_sales += $sum_sales;
                        $total_expenses += $expenses;
                        $total_net += $net;
                        $total_com += $com;
                    @endphp
                     <td>{{ number_format($com,0) }}</td>
                     <td>{{ number_format($net,0) }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="2" class="text-center"><strong>Totals</strong></td>
                <td><strong>{{ number_format($total_sales) }}</strong></td>
                <td><strong>{{ number_format($total_expenses) }}</strong></td>
                <td><strong>{{ number_format($total_com) }}</strong></td>
                <td class="table-secondary text-center"> <strong>{{ number_format($total_net) }}</strong></td>
            </tr>
        </tbody>
    </table>
</div>