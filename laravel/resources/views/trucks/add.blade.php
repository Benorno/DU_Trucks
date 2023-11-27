@extends('index')

@section('title', 'Add Truck')

@section('content')
    <header>
        @include('components.header')
    </header>
    <main>
        <div class="container p-md-5" style="margin-top: 5svh">

            <div class="row mb-5">
                <div class="col d-flex">
                    <a href="{{ route('trucks.index') }}"
                        class="btn btn-outline-dark rounded-4 border-2 fw-semibold me-4 px-3">
                        <i class="bi bi-arrow-left"></i> Back</a>
                    <h2 class="fw-bold">Add Truck</h2>
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
                    <form method="POST" action="{{ route('trucks.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label for="unitNumber" class="form-label fw-semibold">Unit Number <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="unit_no" class="form-control border-dark border-2"
                                        id="unitNumber" placeholder="Unit Number" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label for="year" class="form-label fw-semibold">Year <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="year" class="form-control border-dark border-2"
                                        id="year" placeholder="Year" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="note" class="form-label fw-semibold">Note</label>
                            <textarea class="form-control border-dark border-2" name="note" id="note" rows="4" placeholder="Note"
                                style="resize: none"></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-success rounded-4 border-2 fw-semibold">Add
                                Truck <i class="bi bi-plus-square"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
