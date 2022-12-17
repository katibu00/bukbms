@extends('layouts.master')
@section('PageTitle', 'Expense Items')


@section('content')
    <!-- content @s -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header header-elements">
                <span class="me-2">Expense Items</span>

                <div class="card-header-elements ms-auto">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addNewModal" class="btn btn-sm btn-primary">
                        <span class="tf-icon ti ti-plus ti-xs me-1"></span>Add Expense Item(s)
                    </button>
                </div>
            </div>
            @include('setup.expense.table')
        </div>
        <!--/ Basic Bootstrap Table -->
        @include('setup.expense.add_modal')
        @include('setup.expense.edit_modal')
    </div>
    <!-- content @e -->
@endsection

@section('js')
    @include('setup.expense.script')
    <script src="/sweetalert.min.js"></script>
@endsection
