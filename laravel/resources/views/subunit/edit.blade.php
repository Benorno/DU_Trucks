@extends('index')

@section('title', 'Edit Subunit')

@section('content')
    <header>
        @include('components.header')
    </header>
    <main>
        <div class="container p-md-5" style="margin-top: 5svh">
            <div class="row mb-5">
                <div class="col d-flex">
                    <a href="{{ route('subunits.index') }}"
                        class="btn btn-outline-dark rounded-4 border-2 fw-semibold me-4 px-3">
                        <i class="bi bi-arrow-left"></i> Back</a>
                    <h2 class="fw-bold">Edit Subunit</h2>
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
            <div class="row">
                <div class="col">
                    <form method="POST" action="{{ route('subunits.update', $subunit->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="main_truck" class="form-label">Main Truck</label>
                            <select class="form-control" id="main_truck" name="main_truck">
                                @foreach ($trucks as $truck)
                                    <option value="{{ $truck->id }}"
                                        {{ $subunit->main_truck == $truck->id ? 'selected' : '' }}>
                                        {{ $truck->unit_no }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="subunit" class="form-label">Subunit</label>
                            <select class="form-control" id="subunit" name="subunit">
                                @foreach ($trucks as $truck)
                                    <option value="{{ $truck->id }}"
                                        {{ $subunit->subunit == $truck->id ? 'selected' : '' }}>
                                        {{ $truck->unit_no }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date"
                                value="{{ $subunit->start_date }}">
                        </div>

                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date"
                                value="{{ $subunit->end_date }}">
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active" {{ $subunit->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $subunit->status == 'inactive' ? 'selected' : '' }}>Inactive
                                </option>
                                <option value="expired" {{ $subunit->status == 'expired' ? 'selected' : '' }}>Expired
                                </option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection
