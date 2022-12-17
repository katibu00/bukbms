@extends('layouts.master')
@section('PageTitle', 'Record Sales')
@section('content')

  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">

    <!-- Form Alignment -->
    <div class="card">
      {{-- <h5 class="card-header">Form Alignment</h5> --}}
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-center" style="min-height: 400px">
          <form class="w-px-600 border rounded p-3 p-md-" id="postResultForm">
            <h3 class="mb-4">Record Sales</h3>
            <ul id="error_list"></ul>
            
            <div class="row g-3 mb-2">
                <div class="col-md-6">
                   <input type="date" class="form-control form-control-sm" name="date" required />
                </div>
            </div>

            <div class="add_item">
              <div class="row g-3 mb-2">
                  <div class="col-md-3">
                      <select name="driver_id[]" class="form-select form-select-sm" required>
                        <option value="">--Driver--</option>
                        @foreach ($drivers as $driver)
                        <option value="{{ $driver->driver->id }}">{{ $driver->driver->name.' - '.$driver->bus->name }}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="col-md-3">
                      <select name="route_id[]" class="form-select form-select-sm" required>
                        <option value="">--Route--</option>
                        @foreach ($terminals as $terminal)
                          <option value="{{ $terminal->id }}">{{ $terminal->name }}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="col-md-3">
                      <input type="number" name="tickets[]" placeholder="Tickets" class="form-control form-control-sm" required />
                  </div>
                  <div class="col-md-3 d-flex">
                    <span class="btn btn-xs btn-success addeventmore"><span class="tf-icon ti ti-plus ti-xs me-1"></span></span>
                </div>
              </div>
            </div>

            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary" id="submit_btn">Record Sales</button>
            </div>
          </form>
        </div>
      </div>


      <!--/ Add New Credit Card Modal -->
<div style="visibility: hidden;">
  <div class="whole_extra_item_add" id="whole_extra_item_add">
      <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">

          <div class="row mb-2">
            <div class="col-md-3 mb-2">
              <select name="driver_id[]" class="form-select form-select-sm" required>
                <option value="">--Driver--</option>
                @foreach ($drivers as $driver)
                  <option value="{{ $driver->driver->id }}">{{ $driver->driver->name.' - '.$driver->bus->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="col-md-3 mb-2">
              <select name="route_id[]" class="form-select form-select-sm" required>
                <option value="">--Route--</option>
                @foreach ($terminals as $terminal)
                  <option value="{{ $terminal->id }}">{{ $terminal->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="col-md-3 mb-2">
              <input type="number" name="tickets[]" placeholder="Tickets" class="form-control form-control-sm" required />
          </div>

              <div class="col-md-3 mt-1">
                  <div class="d-flex">
                      <span class="btn btn-xs btn-success  addeventmore me-1"><span class="tf-icon ti ti-plus ti-xs me-1"></span></span>
                      <span class="btn btn-xs btn-danger  removeeventmore"><span class="tf-icon ti ti-minus ti-xs me-1"></span></span>
                  </div>
              </div>
          </div>

      </div>
  </div>
</div>

    </div>
  </div>
  <!-- / Content -->
  @endsection
  @section('js')
   @include('sales.script')
  @endsection


