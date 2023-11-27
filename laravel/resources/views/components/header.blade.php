<div class="container-fluid bg-dark text-light">
    <div class="container py-4">
        <div class="row text-center">
            <div class="col-3">
                <h1><i class="bi bi-truck"></i> Admin Panel</h1>
            </div>
            <div class="col mt-2 d-none d-md-block">
                <a href="{{ route('trucks.index') }}" class="btn btn-outline-light rounded-4 border-2 fw-semibold">Trucks <i class="bi bi-truck"></i></a>
                <a href="" class="btn btn-outline-light rounded-4 border-2 fw-semibold mx-3">Subunits <i class="bi bi-diagram-3"></i></a>
                <a href="" class="btn btn-outline-light rounded-4 border-2 fw-semibold">Database <i class="bi bi-database"></i></a>
                <a href="" class="btn btn-outline-light rounded-4 border-2 fw-semibold mx-3">GitHub <i class="bi bi-github"></i></a>
            </div>
            <div class="col d-block d-md-none">
                <div class="dropdown mt-4 float-end">
                    <button class="btn btn-outline-light dropdown-toggle rounded-4 border-2 fw-semibold" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-list"></i> Menu
                    </button>
                    <ul class="dropdown-menu">
                        <li class="py-2"><a class="dropdown-item" href="{{ route('trucks.index') }}">Trucks <i class="bi bi-truck"></i></a></li>
                        <li class="py-2"><a class="dropdown-item" href="#">Subunits <i class="bi bi-diagram-3"></i></a></li>
                        <li class="py-2"><a class="dropdown-item" href="#">Database <i class="bi bi-database"></i></a></li>
                        <li class="py-2"><a class="dropdown-item" href="#">GitHub <i class="bi bi-github"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
