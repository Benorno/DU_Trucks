<div class="container">
    <div class="row" style="margin-top: 5svh; margin-bottom: 10svh">
        <div class="col">
            <h1><i class="bi bi-diagram-3"></i> Subunits</h1>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                <a href="{{ route('subunits.create') }}"
                    class="btn btn-outline-success rounded-4 border-2 fw-semibold mb-lg-0 mb-2">Add Subunit <i
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
            <div class="col-12 col-xl-6">
                <label for="main_truck" class="form-label fw-semibold">Trucks</label>
                <input class="form-control me-2" name="subunits_search" type="search"
                    placeholder="Search by Unit Number" aria-label="Search">
            </div>
            <div class="col-12 col-xl-2">
                <label for="start_date" class="form-label fw-semibold">Start Date</label>
                <input class="form-control me-2" name="start_date" type="date" placeholder="Start Date"
                    aria-label="Start Date">
            </div>
            <div class="col-12 col-xl-2">
                <label for="end_date" class="form-label fw-semibold">End Date</label>
                <input class="form-control me-2" name="end_date" type="date" placeholder="End Date"
                    aria-label="End Date">
            </div>
            <div class="col-lg-2 col-md-3 col-4 mt-3">
                <button class="btn btn-outline-dark rounded-4 border-2 py-xl-3 px-xl-4" type="submit">Search <i
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
                    <th>Main Truck</th>
                    <th>Subunit</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                @foreach ($subunits as $subunit)
                    <tr>
                        <td>{{ $subunit->mainTruck->unit_no }}</td>
                        <td>{{ $subunit->subunitTruck->unit_no }}</td>
                        <td>{{ $subunit->start_date }}</td>
                        <td>{{ $subunit->end_date }}</td>
                        <td>
                            <span
                                class="fw-semibold text-uppercase {{ $subunit->status == 'active' ? 'text-success' : ($subunit->status == 'inactive' ? 'text-warning' : 'text-danger') }}">
                                {{ $subunit->status }}
                            </span>
                        </td>
                        <td>
                            <div>
                                <a href="{{ route('subunits.edit', $subunit->id) }}"
                                    class="btn btn-sm btn-outline-primary rounded-4 border-2 fw-semibold mb-xl-0 mb-2">Edit
                                    <i class="bi bi-pencil-square"></i></a>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
