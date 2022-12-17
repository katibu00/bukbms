@extends('layouts.master')
@section('PageTitle', 'Assign Drivers')
@section('css')
<link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css" />
@endsection
@section('content')
    <!-- content @s -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header header-elements">
                <span class="me-2">Assign Drivers</span>

                <div class="card-header-elements ms-auto">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addNewModal" class="btn btn-sm btn-primary">
                        <span class="tf-icon ti ti-plus ti-xs me-1"></span>Assign New Driver
                    </button>
                </div>
            </div>
            @include('setup.assign_drivers.table')
        </div>
        <!--/ Basic Bootstrap Table -->
        @include('setup.assign_drivers.add_modal')
    </div>
    <!-- content @e -->
@endsection

@section('js')
    @include('setup.assign_drivers.script')
    <script src="/sweetalert.min.js"></script>
    <script src="/assets/js/modal-edit-user.js"></script>
    <script src="/assets/vendor/libs/select2/select2.js"></script>
@endsection
