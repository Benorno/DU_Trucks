@extends('index')

@section('title', 'Edit Truck')

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
                    <h2 class="fw-bold">Edit Truck</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label for="unitNumber" class="form-label fw-semibold">Unit Number</label>
                                    <input type="text" name="unit_no" class="form-control border-dark border-2"
                                        id="unitNumber" placeholder="Unit Number">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label for="year" class="form-label fw-semibold">Year</label>
                                    <input type="text" name="year" class="form-control border-dark border-2"
                                        id="year" placeholder="Year">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="note" class="form-label fw-semibold">Note</label>
                            <textarea class="form-control border-dark border-2" name="note" id="note" rows="4" placeholder="Note"
                                style="resize: none"></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-success rounded-4 border-2 fw-semibold">Edit
                                Truck <i class="bi bi-pencil-square"></i></button>
                            <button type="submit" class="btn btn-outline-danger rounded-4 border-2 fw-semibold ms-3">Delete
                                Truck <i class="bi bi-trash"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
