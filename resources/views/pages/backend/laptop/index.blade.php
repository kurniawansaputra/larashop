@extends('layouts.app')

@section('title')
    Laptops
@endsection

@push('extra-style')
    <!-- Custom styles for this page -->
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Laptops</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">List of Laptops</h6>
                <a href="{{ route('laptops.create') }}" class="btn btn-primary">
                    <span class="text">New Laptops</span>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Quantity (unit)</th>
                                <th>Price (Rp)</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laptops as $laptop)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $laptop->name }}</td>
                                    <td>{{ $laptop->quantity }}</td>
                                    <td>{{ $laptop->price }}</td>
                                    <td>
                                        @if ($laptop->image)
                                            <img class="card-img-top" src="{{ asset('storage/laptops/' . $laptop->image) }}"
                                                alt="{{ $laptop->name }}" width="80" height="80" />
                                        @else
                                            <!-- Image from internet as fallback -->
                                            <img class="card-img-top" src="https://placehold.co/450x300"
                                                alt="Placeholder Image" width="80" height="80" />
                                        @endif
                                    <td>
                                        <a href="{{ route('laptops.edit', $laptop->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('laptops.destroy', $laptop->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger delete-btn">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('extra-script')
    <!-- Page level plugins -->
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>
@endpush
