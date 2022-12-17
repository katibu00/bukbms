<!-- Add New Credit Card Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-3">
                    <h3 class="mb-2">Edit Terminal</h3>
                </div>

                <form id="addNewForm" class="ro4w g-3">


                    <ul id="update_error_list"></ul>
                    <input type="hidden" id="update_id">

                    <div class="add_item">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <input type="text" id="edit_name" class="form-control" placeholder="Enter Route Name" />
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="edit_price" class="form-control" placeholder="Price" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="status">
                                <label class="form-check-label">
                                    Active
                                </label>
                            </div>
                        </div>
                    </div>



                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1" id="update_btn">Update</button>
                        <button type="reset" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal"
                            aria-label="Close">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Add New Credit Card Modal -->
