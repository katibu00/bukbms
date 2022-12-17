  <!-- Edit User Modal -->
  <div class="modal fade" id="addNewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">Assign Cashier</h3>
            <p class="text-muted">Cashiers will be able to access all the transaction records of his terminal. </p>
          </div>
          <form id="addNewForm" class="row g-3">
          
            

            <div class="col-12 col-md-4">
              <label class="form-label" for="cashier">Cashier</label>
              <select
                id="cashier"
                name="cashier"
                class="form-select">
                <option value="">Select</option>
                @foreach ($cashiers as $cashier)
                <option value="{{ $cashier->id }}">{{ $cashier->name }}</option>
                @endforeach
               
              </select>
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label" for="terminal">Terminal</label>
              <select
                id="terminal"
                name="terminal"
                class="form-select">
                <option value="">Select</option>
                @foreach ($terminals as $terminal)
                <option value="{{ $terminal->id }}">{{ $terminal->name }}</option>
                @endforeach
               
              </select>
            </div>
           
           
     
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1" id="submit_btn">Submit</button>
              <button
                type="reset"
                class="btn btn-label-secondary"
                data-bs-dismiss="modal"
                aria-label="Close"
              >
                Cancel
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--/ Edit User Modal -->