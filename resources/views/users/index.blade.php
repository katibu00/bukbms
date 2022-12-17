@extends('layouts.master')
@section('PageTitle', 'Users')


@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
	

	<div class="row mb-5">
	 
	 
	 

	  <div class="col-md">
		<div class="card mb-4">
		  <div class="card-body">
			
			<div class="card-title header-elements  d-flex flex-row">
			  <h5 class="m-0 me-2 d-none d-md-block">Users</h5>
			  

			  <div class="card-title-elements ms-auto">
				<select class="form-select form-select-sm w-auto" id="index_role">
				  <option value="all">All</option>
				  <option value="driver">Drivers</option>
				  <option value="cashier">Cashiers</option>
				  <option value="admin">Admins</option>
				</select>
				<button type="button" class="btn btn-xs btn-primary" data-bs-toggle="modal" data-bs-target="#addNewModal">
					<span class="tf-icon ti ti-plus ti-xs me-1"></span>Add User
				</button>
			  </div>
			</div>

			<div class="text-center d-flex justify-content-center my-5 d-none" id="loading_div">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

			<div class="" id="content_div">
				@include('users.table')
			</div>
			
		  </div>
		</div>
	  </div>
	</div>
	<!--/ Header elements -->

	@include('users.details_modal')
	@include('users.add_modal')
	
  </div>

@endsection

@section('js')
    @include('users.script')
    <script src="/sweetalert.min.js"></script>
@endsection