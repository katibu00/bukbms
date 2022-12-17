@extends('layouts.master')
@section('PageTitle', 'Edit Assign Drivers')
@section('css')
    <link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css" />
@endsection
@section('content')
    <!-- content @s -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header header-elements">
                <span class="me-2">Edit Assign Drivers</span>

                <div class="card-header-elements ms-auto">
                    <a href="{{ route('assign.drivers.index') }}" class="btn btn-sm btn-primary">
                        <span class="tf-icon ti ti-list ti-xs me-1"></span>Back to List
                    </a>
                </div>
            </div>


            <div class="card-body">
                <form action="{{ route('assign.drivers.update',$row->id)}}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Driver</label>
                        <div class="col-sm-10">
                            <select id="driver" name="driver" class="form-select">
                                <option value="">Select</option>
                                @foreach ($drivers as $driver)
                                    <option value="{{ $driver->id }}" {{ $row->driver_id == $driver->id ? 'selected':''}}>{{ $driver->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Bus</label>
                        <div class="col-sm-10">
                            <select id="driver" name="bus" class="form-select">
                                <option value="">Select</option>
                                @foreach ($buses as $bus)
                                    <option value="{{ $bus->id }}"  {{ $row->bus_id == $bus->id ? 'selected':''}}>{{ $bus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Routes</label>
                        <div class="col-sm-10">
                            <select id="routes" name="routes[]" class="select2 form-select" multiple>
                                <option value="">Select</option>
                                @foreach ($routes as $route)
                                    <option value="{{ $route->id }}" @if(in_array($route->id, explode(',', $row->terminal_id))) selected @endif>{{ $route->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
    <!-- content @e -->
@endsection