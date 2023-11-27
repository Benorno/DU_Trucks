<div class="container">
    <div class="row" style="margin-top: 5svh; margin-bottom: 10svh">
        <div class="col">
            <h1><i class="bi bi-truck"></i> Trucks</h1>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                <a href="{{ route('trucks.create') }}"
                    class="btn btn-outline-success rounded-4 border-2 fw-semibold mb-lg-0 mb-2">Add Truck <i
                        class="bi bi-plus-square"></i></a>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="mb-4">
        <div class="row">
            <div class="col">
                <input class="form-control me-2" name="trucks_search" type="search"
                    placeholder="Search by Unit Number, Year or Notes" aria-label="Search">
            </div>
            <div class="col-lg-2 col-md-3 col-4">
                <button class="btn btn-outline-dark rounded-4 border-2" type="submit">Search <i
                        class="bi bi-search"></i></button>
            </div>
        </div>
    </form>
</div>
<div class="container-fluid p-md-5">
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <tr>
                    <th class="col-1">Unit Number</th>
                    <th class="col-1">Year</th>
                    <th class="col-5">Note</th>
                    <th class="col-1">Actions</th>
                </tr>
                @foreach ($trucks as $truck)
                    <tr>
                        <td>{{ $truck->unit_no }}</td>
                        <td>{{ $truck->year }}</td>
                        <td>{{ $truck->note }}</td>
                        <td>
                            <div class="d-none d-xxl-block">
                                <a href="{{ route('trucks.edit', $truck->id) }}"
                                    class="btn btn-sm btn-outline-primary rounded-4 border-2 fw-semibold mb-xl-0 mb-2">Edit
                                    <i class="bi bi-pencil-square"></i></a>
                                <a href="" class="btn btn-sm btn-outline-danger rounded-4 border-2 fw-semibold"
                                    data-bs-toggle="modal" data-bs-target="#deleteModal">Delete
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>

                            <div class="d-block d-xxl-none">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-dark dropdown-toggle rounded-4 border-2"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-card-list fs-5 px-2"></i>
                                    </button>
                                    <ul class="dropdown-menu text-center">
                                        <li class="py-3"><a href="{{ route('trucks.edit', $truck->id) }}"
                                                class="fw-semibold text-decoration-none link-primary">Edit
                                                <i class="bi bi-pencil-square"></i></a></li>
                                        <li class="py-3"><a href=""
                                                class="btn btn-sm btn-outline-danger rounded-4 border-2 fw-semibold"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal">Delete
                                                <i class="bi bi-trash"></i>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete truck - <span class="fw-semibold text-danger">{{ $truck->unit_no }}</span>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel <i class="bi bi-x-lg"></i></button>
                                    <form action="{{ route('trucks.destroy', $truck->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete <i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </table>
        </div>
    </div>
</div>
