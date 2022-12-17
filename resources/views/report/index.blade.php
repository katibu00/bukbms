@extends('layouts.master')
@section('PageTitle', 'Report')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">

      <!-- Select Election -->
      <div class="col-12 mb-4">
        <div class="card">
          <div class="card-body">
            
            <div class="d-fle4x flex-row align-items-center he4ader-elements">
              <form action="{{ route('report.generate')}}" method="post">
                @csrf
                <div class="row">
                <div class="col-md-3 mb-2">
                    <label>Type</label>
                    <select name="report" id="type" class="form-select form-select-sm" required>
                        <option value=""></option>
                        <option value="gross" {{ @$report == 'gross'? 'selected':''}}>Gross</option>
                        <option value="terminal" {{ @$report == 'terminal'? 'selected':''}}>By Terminal</option>
                        <option value="driver" {{ @$report == 'driver'? 'selected':''}}>By Driver</option>
                    </select>
                </div>
                <div class="col-md-3 mb-2 d-none" id="terminal_div">
                    <label>Terminal</label>
                    <select name="terminal_id" class="form-select form-select-sm">
                        <option value=""></option>
                        
                    </select>
                </div>
                <div class="col-md-3 mb-2 d-none" id="driver_div">
                    <label>Driver</label>
                    <select name="driver_id" class="form-select form-select-sm">
                        <option value=""></option>
                        
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
            <h5 class="card-header">Gross Report</h5>
            <div class="card-body">
                @include('report.gross_table')
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
        $(document).on('change', '#type', function() {

            var type = $('#report').val();

            if(type == 'terminal')
            {
                $("#terminal_div").removeClass("d-none");
            }else{
                $("#terminal_div").addClass("d-none");
            }
            if(type == 'driver')
            {
                $("#driver_div").removeClass("d-none");
            }else{
                $("#driver_div").addClass("d-none");
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
@endsection
