@extends('index')

@section('title', 'Add Subunit')

@section('content')
    <header>
        @include('components.header')
    </header>
    <main>
        <div class="container" style="margin-top: 10svh">
        <div class="row mb-5">
                <div class="col d-flex">
                    <a href="{{ route('subunits.index') }}"
                        class="btn btn-outline-dark rounded-4 border-2 fw-semibold me-4 px-3">
                        <i class="bi bi-arrow-left"></i> Back</a>
                    <h2 class="fw-bold">Add Subunit</h2>
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
            <form action="{{ route('subunits.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6 form-group">
                        <label for="main_truck" class="form-label fw-semibold">Main Truck</label>
                        <select id="main_truck" name="main_truck" class="form-control border-dark border-2">
                            @foreach ($trucks as $truck)
                                <option value="{{ $truck->id }}">{{ $truck->unit_no }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-lg-6 form-group">
                        <label for="subunit" class="form-label fw-semibold">Subunit</label>
                        <select id="subunit" name="subunit" class="form-control border-dark border-2">
                            @foreach ($trucks as $truck)
                                <option value="{{ $truck->id }}">{{ $truck->unit_no }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-lg-6 form-group">
                        <label for="start_date" class="form-label fw-semibold">Start Date</label>
                        <input type="date" id="start_date" name="start_date" class="form-control border-dark border-2">
                    </div>
                    <div class="col-12 col-lg-6 form-group">
                        <label for="end_date" class="form-label fw-semibold">End Date</label>
                        <input type="date" id="end_date" name="end_date" class="form-control border-dark border-2">
                    </div>
                    <div class="col">
                        <button type="submit"
                            class="btn btn-outline-success rounded-4 border-2 fw-semibold float-end mt-4">Create
                            Subunit</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script>
        document.getElementById('main_truck').addEventListener('change', function() {
            document.getElementById('subunit').querySelector(`option[value="${this.value}"]`).disabled = true;
        });

        document.getElementById('subunit').addEventListener('change', function() {
            document.getElementById('main_truck').querySelector(`option[value="${this.value}"]`).disabled = true;
        });
    </script>
@endsection
