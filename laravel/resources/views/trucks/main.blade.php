<div class="container">
    <div class="row" style="margin-top: 5svh; margin-bottom: 10svh">
        <div class="col">
            <h1><i class="bi bi-truck"></i> Trucks</h1>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                <a href="{{ route('trucks.create') }}" class="btn btn-outline-success rounded-4 border-2 fw-semibold mb-lg-0 mb-2">Add Truck <i
                        class="bi bi-plus-square"></i></a>
            </div>
        </div>
    </div>
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
                    <th>Truck ID</th>
                    <th>Unit Number</th>
                    <th>Year</th>
                    <th class="col-5">Note</th>
                    <th class="col-xl-2">Actions</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>2000</td>
                    <td>Truck 1</td>
                    <td>
                        <div class="d-none d-lg-block">
                            <a href="{{ route('trucks.edit') }}"
                                class="btn btn-sm btn-outline-primary rounded-4 border-2 fw-semibold mb-lg-0 mb-2">Edit
                                <i class="bi bi-pencil-square"></i></a>
                            <a href=""
                                class="btn btn-sm btn-outline-danger rounded-4 border-2 fw-semibold">Delete
                                <i class="bi bi-trash"></i></a>
                        </div>

                        <div class="d-block d-lg-none">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-dark dropdown-toggle rounded-4 border-2"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-card-list fs-5 px-2"></i>
                                </button>
                                <ul class="dropdown-menu text-center">
                                    <li class="py-3"><a href=""
                                            class="fw-semibold text-decoration-none link-success">Edit
                                            <i class="bi bi-pencil-square"></i></a></li>
                                    <li class="py-3"><a href=""
                                            class="fw-semibold text-decoration-none link-danger">Delete
                                            <i class="bi bi-trash"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
