@extends('layouts.master')
@section('PageTitle', 'Assign Cashiers')
@section('content')
    <!-- content @s -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header header-elements">
                <span class="me-2">Assign Cashiers</span>

                <div class="card-header-elements ms-auto">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addNewModal" class="btn btn-sm btn-primary">
                        <span class="tf-icon ti ti-plus ti-xs me-1"></span>Assign New Cashiers
                    </button>
                </div>
            </div>
            @include('setup.assign_cashiers.table')
        </div>
        <!--/ Basic Bootstrap Table -->
        @include('setup.assign_cashiers.add_modal')
    </div>
    <!-- content @e -->
@endsection

@section('js')
    @include('setup.assign_cashiers.script')
    <script src="/sweetalert.min.js"></script>
@endsection
