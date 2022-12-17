@extends('layouts.master')
@section('PageTitle', 'Buses ')


@section('content')
    <!-- content @s -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header header-elements">
                <span class="me-2">Buses</span>

                <div class="card-header-elements ms-auto">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addNewModal" class="btn btn-sm btn-primary">
                        <span class="tf-icon ti ti-plus ti-xs me-1"></span>Add Bus(s)
                    </button>
                </div>
            </div>
            @include('setup.buses.table')
        </div>
        <!--/ Basic Bootstrap Table -->
        @include('setup.buses.add_modal')
        @include('setup.buses.edit_modal')
    </div>
    <!-- content @e -->
@endsection

@section('js')
    @include('setup.buses.script')
    <script src="/sweetalert.min.js"></script>
@endsection
