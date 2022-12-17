@extends('layouts.master')
@section('PageTitle', 'Edit Assign Cashier')
@section('css')
    <link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css" />
@endsection
@section('content')
    <!-- content @s -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header header-elements">
                <span class="me-2">Edit Assign Cashier</span>

                <div class="card-header-elements ms-auto">
                    <a href="{{ route('assign.cashiers.index') }}" class="btn btn-sm btn-primary">
                        <span class="tf-icon ti ti-list ti-xs me-1"></span>Back to List
                    </a>
                </div>
            </div>


            <div class="card-body">
                <form action="{{ route('assign.cashiers.update',$row->id)}}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="cashier">Cashier</label>
                        <div class="col-sm-10">
                            <select id="cashier" name="cashier" class="form-select">
                                <option value="">Select</option>
                                @foreach ($cashiers as $cashier)
                                    <option value="{{ $cashier->id }}" {{ $row->cashier_id == $cashier->id ? 'selected':''}}>{{ $cashier->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="terminal">Terminal</label>
                        <div class="col-sm-10">
                            <select id="terminal" name="terminal" class="form-select">
                                <option value="">Select</option>
                                @foreach ($terminals as $terminal)
                                    <option value="{{ $terminal->id }}"  {{ $row->terminal_id == $terminal->id ? 'selected':''}}>{{ $terminal->name }}</option>
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
