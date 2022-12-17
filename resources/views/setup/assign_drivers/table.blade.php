<div class="table-responsive text-nowrap">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Driver</th>
                <th>Bus</th>
                <th>Routes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($allData as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <strong>{{ $value->driver->name }}</strong>
                    </td>
                    <td>
                        <strong>{{ $value->bus->name }}</strong>
                    </td>
                    @php
                        $terminals = explode(',', $value->terminal_id); 
                    @endphp
                    <td>
                        @foreach ($terminals as $terminal)
                    @php
                        $name = App\Models\Route::find($terminal);
                    @endphp
                        <span class="badge badge bg-secondary">{{ @$name->name }}</span>
                    @endforeach
                    </td>
                    <td>
                        <div>
                            <a href="{{ route('assign.drivers.edit',$value->id )}}" class="btn btn-icon btn-outline-primary">
                                <span class="ti ti-pencil me-1"></span>
                            </a>
                            <button type="button"  data-id="{{ $value->id }}" data-name="{{ $value->name }}" class="btn btn-icon btn-outline-danger deleteItem">
                                <span class="ti ti-trash me-1"></span>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>