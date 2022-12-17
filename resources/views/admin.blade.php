@extends('layouts.master')
@section('PageTitle', 'Admin Home')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
   @php
     $today = 0;
     $total_expense = 0;
     $total_week = 0;
     $total_month = 0;
   @endphp
   @foreach ($sales as $sale)
    @php
      $today += $sale->tickets * $sale->price;
    @endphp
   @endforeach
   @foreach ($expenses as $expense)
    @php
      $total_expense += $expense->amount;
    @endphp
   @endforeach
   @foreach ($weeks as $week)
    @php
      $total_week += $week->tickets * $week->price;
    @endphp
   @endforeach
   @foreach ($months as $month)
    @php
      $total_month += $month->tickets * $month->price;
    @endphp
   @endforeach
  <div class="row">
    <!-- today sale -->
    <div class="col-lg-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body pb-0">
          <div class="card-icon">
            <span class="badge bg-label-primary rounded-pill p-2">
              <i class="ti ti-cash ti-sm"></i>
            </span>
          </div>
          <h5 class="card-title mb-0 mt-2">&#8358;{{ number_format($today,0) }}</h5>
          <small>Today's Revenue</small>
        </div>
        <div id="subscriberGained"></div>
      </div>
    </div>

    <!-- expenses -->
    <div class="col-lg-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body pb-0">
          <div class="card-icon">
            <span class="badge bg-label-danger rounded-pill p-2">
              <i class="ti ti-cash ti-sm"></i>
            </span>
          </div>
          <h5 class="card-title mb-0 mt-2">&#8358;{{ number_format($total_expense,0) }}</h5>
          <small>Expenses (Today)</small>
        </div>
        <div id="quarterlySales"></div>
      </div>
    </div>

    <!-- this week -->
    <div class="col-lg-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body pb-0">
          <div class="card-icon">
            <span class="badge bg-label-warning rounded-pill p-2">
              <i class="ti ti-cash ti-sm"></i>
            </span>
          </div>
          <h5 class="card-title mb-0 mt-2">&#8358;{{ number_format($total_week,0) }}</h5>
          <small>Revenue (This Week)</small>
        </div>
        <div id="orderReceived"></div>
      </div>
    </div>

    <!-- Revenue month -->
    <div class="col-lg-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body pb-0">
          <div class="card-icon">
            <span class="badge bg-label-success rounded-pill p-2">
              <i class="ti ti-calendar ti-sm"></i>
            </span>
          </div>
          <h5 class="card-title mb-0 mt-2">&#8358;{{ number_format($total_month,0) }}</h5>
          <small>Revenue (This Month)</small>
        </div>
        <div id="revenueGenerated"></div>
      </div>
    </div>


      <!-- Todays Sale -->
      <div class="col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-header d-flex justify-content-between">
            <h5 class="card-title m-0 me-2">Sales of Ticket (Today)</h5>
          </div>
          <div class="table-responsive">
            <table class="table table-borderless border-top">
              <thead class="border-bottom">
                <tr>
                  <th>#</th>
                  <th>Driver</th>
                  <th>Terminal</th>
                  <th>Cashier</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sales as $key => $sale)
                <tr>
                  <td>{{ $key + 1}}</td>
                  <td>{{ $sale->driver->name}}</td>
                  <td>{{ $sale->route->name}}</td>
                  <td>{{ $sale->cashier->name}}</td>
                  <td>{{ number_format($sale->tickets * $sale->price,0)}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!--/ sale -->

        <!-- todays Expenses -->
        <div class="col-md-6 mb-4">
          <div class="card h-100">
            <div class="card-header d-flex justify-content-between">
              <h5 class="card-title m-0 me-2">Expenses (Today)</h5>
            </div>
            <div class="table-responsive">
              <table class="table table-borderless border-top">
                <thead class="border-bottom">
                  <tr>
                    <th>#</th>
                    <th>Driver</th>
                    <th>Cashier</th>
                    <th>Item</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($expenses as $key2 => $expense)
                  <tr>
                      <td>{{ $key2 + 1}}</td>
                      <td>{{ $expense->driver->name }}</td>
                      <td>{{ $expense->cashier->name }}</td>
                      <td>{{ $expense->item->name }}</td>
                      <td>{{ number_format($expense->amount,0) }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!--/ expenses -->
  </div>
  </div>
  <!-- / Content -->
  @endsection
  @section('js')
  <script src="/assets/js/cards-statistics.js"></script>
  @endsection