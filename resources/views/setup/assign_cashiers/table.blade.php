<div class="table-responsive text-nowrap">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Cashier</th>
                <th>Terminal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($allData as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <strong>{{ @$value->cashier->name }}</strong>
                    </td>
                    <td>
                        <strong>{{ @$value->route->name }}</strong>
                    </td>
                    <td>
                        <div>
                            <a href="{{ route('assign.cashiers.edit',$value->id )}}" class="btn btn-icon btn-outline-primary">
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