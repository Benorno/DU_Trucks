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
                    <form method="POST" route="{{ route('trucks.update', $truck->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6 col-12 mb-3">
                                <label for="unitNumber" class="form-label fw-semibold">Unit Number <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="unit_no" class="form-control border-dark border-2"
                                    id="unitNumber" placeholder="Unit Number" required value="{{ $truck->unit_no }}">
                            </div>

                            <div class="col-lg-6 col-12 mb-3">
                                <label for="year" class="form-label fw-semibold">Year <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="year" class="form-control border-dark border-2"
                                    id="year" placeholder="Year" required value="{{ $truck->year }}">
                            </div>

                            <div class="mb-3">
                                <label for="note" class="form-label fw-semibold">Note</label>
                                <textarea class="form-control border-dark border-2" name="note" id="note" rows="4" placeholder="Note"
                                    style="resize: none">{{ $truck->note }}</textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-outline-success rounded-4 border-2 fw-semibold me-2">Update
                                    Truck <i class="bi bi-pencil-square"></i></button>
                                <a href="" class="btn btn-outline-danger rounded-4 border-2 fw-semibold"
                                    data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Truck
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete truck - <span
                                class="fw-semibold text-danger">{{ $truck->unit_no }}</span>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel <i
                                    class="bi bi-x-lg"></i></button>
                            <form action="{{ route('trucks.destroy', $truck->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete <i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
