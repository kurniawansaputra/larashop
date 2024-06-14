@extends('layouts.app')

@section('title')
    Create Brand
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Create Brand</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <form action="{{ route('brands.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Enter name" value="{{ old('name') }}"
                            class="form-control" @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('brands.index') }}" class="btn btn-secondary">
                        <span class="text">Cancel</span>
                    </a>
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
