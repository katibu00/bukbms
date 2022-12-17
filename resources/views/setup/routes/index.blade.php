@extends('layouts.master')
@section('PageTitle', 'Terminals')


@section('content')
    <!-- content @s -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header header-elements">
                <span class="me-2">Terminals</span>

                <div class="card-header-elements ms-auto">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addNewModal" class="btn btn-sm btn-primary">
                        <span class="tf-icon ti ti-plus ti-xs me-1"></span>Add Terminal(s)
                    </button>
                </div>
            </div>
            @include('setup.routes.table')
        </div>
        <!--/ Basic Bootstrap Table -->
        @include('setup.routes.add_modal')
        @include('setup.routes.edit_modal')
    </div>
    <!-- content @e -->
@endsection

@section('js')
    @include('setup.routes.script')
    <script src="/sweetalert.min.js"></script>
@endsection
