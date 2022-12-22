@extends('layouts.master')
@section('PageTitle', 'Report')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">

      <!-- Select Election -->
      <div class="col-12 mb-4">
        <div class="card">
          <div class="card-body">
            
            <div class="d-flex4 align-items-center he4ader-elements">
              <form action="{{ route('report.generate')}}" method="post">
                @csrf
                <div class="row">
                <div class="col-md-3 mb-2">
                    <label>Type</label>
                    <select name="report" id="report" class="form-select form-select-sm" required>
                        <option value=""></option>
                        <option value="gross" {{ @$report == 'gross'? 'selected':''}}>Detailed Report</option>
                        <option value="terminal" {{ @$report == 'terminal'? 'selected':''}}>Sales (Terminal)</option>
                        <option value="driver" {{ @$report == 'driver'? 'selected':''}}>Sales (Driver)</option>
                        <option value="summary" {{ @$report == 'summary'? 'selected':''}}>Summary</option>
                    </select>
                </div>
                <div class="col-md-3 mb-2 d-none" id="terminal_div">
                    <label>Terminal</label>
                    <select name="terminal_id" id="terminal_id" class="form-select form-select-sm">
                        <option value=""></option>
                        @foreach ($terminals as $terminal)
                        <option value="{{ $terminal->id }}" {{ @$terminal_id == $terminal->id? 'selected':''}}>{{ $terminal->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-2 d-none" id="driver_div">
                    <label>Driver</label>
                    <select name="driver_id" id="driver_id" class="form-select form-select-sm">
                        <option value=""></option>
                        @foreach ($drivers as $driver)
                        <option value="{{ $driver->id }}" {{ @$driver_id == $driver->id? 'selected':''}}>{{ $driver->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-2">
                    <label>Time</label>
                    <select name="time" id="time" class="form-select form-select-sm" required>
                        <option value=""></option>
                        <option value="today" {{ @$time == 'today'? 'selected':''}}>Today</option>
                        <option value="week" {{ @$time == 'week'? 'selected':''}}>This Week</option>
                        <option value="month" {{ @$time == 'month'? 'selected':''}}>This Month</option>
                        <option value="range" {{ @$time == 'range'? 'selected':''}}>Date Range</option>
                    </select>
                </div>
                <div class="d-none row" id="range_div">
                    <div class="col-md-3 mb-2">
                        <label>Start Date</label>
                    <input type="date" name="start_date" class="form-control form-control-sm" />
                    </div>
                    <div class="col-md-3 mb-2">
                        <label>End Date</label>
                    <input type="date" name="end_date" class="form-control form-control-sm" />
                    </div>
                </div>
                <div class="col-md-2">
                    <label></label>
                    <button type="submit" class="btn btn-sm btn-primary mt-3">Fetch Record</button>
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>

      @if(@$report == 'gross')
        <div class="col-lg-12 col-12 mb-4">
            <div class="card">
            <h5 class="card-header">Detailed Report (All)</h5>
            <div class="card-body">
                @include('report.gross_table')
            </div>
            </div>
        </div>
      @endif
      @if(@$report == 'driver')
        <div class="col-lg-12 col-12 mb-4">
            <div class="card">
            <h5 class="card-header">Detailed Report (Driver)</h5>
            <div class="card-body">
                @include('report.driver_table')
            </div>
            </div>
        </div>
      @endif
      @if(@$report == 'summary')
        <div class="col-lg-12 col-12 mb-4">
            <div class="card">
            <h5 class="card-header">Summary Report</h5>
            <div class="card-body">
                @include('report.summary_table')
            </div>
            </div>
        </div>
      @endif
      @if(@$report == 'terminal')
        <div class="col-lg-12 col-12 mb-4">
            <div class="card">
            <h5 class="card-header">Detailed Report (Terminal)</h5>
            <div class="card-body">
                @include('report.terminal_table')
            </div>
            </div>
        </div>
      @endif
      
    </div>
  </div>
  
@endsection

@section('js')

<script type="text/javascript">
    $(function() {
        $(document).on('change', '#report', function() {

            var type = $('#report').val();
            ///terminal
            if(type == 'terminal')
            {
                $("#terminal_div").removeClass("d-none");
                $("#terminal_id").attr("required", true);
            }else{
                $("#terminal_div").addClass("d-none");
                $("#terminal_id").attr("required", false);
            }
            ///driver
            if(type == 'driver')
            {
                $("#driver_div").removeClass("d-none");
                $("#driver_id").attr("required", true);
            }else{
                $("#driver_div").addClass("d-none");
                $("#driver_id").attr("required", false);
            }



        });

    });
</script>
<script type="text/javascript">
    $(function() {
        $(document).on('change', '#time', function() {

            var time = $('#time').val();

            if(time == 'range')
            {
                $("#range_div").removeClass("d-none");
            }else{
                $("#range_div").addClass("d-none");
            }


        });

    });
</script>

@if(@$report == 'terminal')
<script type="text/javascript">
    $("#terminal_div").removeClass("d-none");
</script>
@endif
@if(@$report == 'driver')
<script type="text/javascript">
    $("#driver_div").removeClass("d-none");
</script>
@endif
@endsection
