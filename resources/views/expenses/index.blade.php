@extends('layouts.master')
@section('PageTitle', 'Expense')
@section('content')
    <!-- content @s -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header header-elements">
                <span class="me-2">Expense</span>

                <div class="card-header-elements ms-auto">
                    <a href="{{ route('expenses.create') }}" class="btn btn-sm btn-primary">
                        <span class="tf-icon ti ti-plus ti-xs me-1"></span>Record New Expense
                    </a>
                </div>
            </div>
           

            <div class="table-responsive text-nowrap">
              <table class="table table-hover">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Driver Name</th>
                          <th>Cashier</th>
                          <th>Amount</th>
                          <th>Recorded</th>
                      </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                      @foreach ($allData as $key => $value)
                          <tr>
                              <td>{{ $key + 1 }}</td>
                              <td>
                                  <strong>{{ @$value->driver->name }}</strong>
                              </td>
                              <td>
                                  {{ @$value->cashier->name }}
                              </td>
                              <td>
                                  {{ number_format(@$value->amount,0) }}
                              </td>
                              <td>
                                  {{ @$value->created_at->diffForHumans() }}
                              </td>
                              
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>



        </div>
        <!--/ Basic Bootstrap Table -->
       
    </div>
    <!-- content @e -->
@endsection


