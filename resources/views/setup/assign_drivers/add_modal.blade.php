  <!-- Edit User Modal -->
  <div class="modal fade" id="addNewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">Assign Driver</h3>
            <p class="text-muted">Driver name will be accessed in only terminals where he's assigned </p>
          </div>
          <form id="addNewForm" class="row g-3">
          
            

            <div class="col-12 col-md-4">
              <label class="form-label" for="driver">Driver</label>
              <select
                id="driver"
                name="driver"
                class="form-select">
                <option value="">Select</option>
                @foreach ($drivers as $driver)
                <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                @endforeach
               
              </select>
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label" for="driver">Bus</label>
              <select
                id="driver"
                name="bus"
                class="form-select">
                <option value="">Select</option>
                @foreach ($buses as $bus)
                <option value="{{ $bus->id }}">{{ $bus->name }}</option>
                @endforeach
               
              </select>
            </div>
            <div class="col-12 col-md-4">
              <label class="form-label" for="routes">Routes</label>
              <select
                id="routes"
                name="routes[]"
                class="select2 form-select"
                multiple >
                <option value="">Select</option>
                @foreach ($routes as $route)
                <option value="{{ $route->id }}">{{ $route->name }}</option>
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