@extends('layouts.master')
@section('PageTitle', 'Sales')
@section('content')
    <!-- content @s -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header header-elements">
                <span class="me-2">Sales</span>

                <div class="card-header-elements ms-auto">
                    <a href="{{ route('sales.create') }}" class="btn btn-sm btn-primary">
                        <span class="tf-icon ti ti-plus ti-xs me-1"></span>Record New Sale
                    </a>
                </div>
            </div>
           

            <div class="table-responsive text-nowrap">
              <table class="table table-hover">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Driver Name</th>
                          <th>Terminal</th>
                          <th>Cashier</th>
                          <th>Tickets</th>
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
                                  {{ @$value->route->name }}
                              </td>
                              <td>
                                  {{ @$value->cashier->name }}
                              </td>
                              <td>
                                  {{ number_format(@$value->tickets,0) }}
                              </td>
                              <td>
                                  {{ number_format(@$value->tickets*@$value->price,0) }}
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


