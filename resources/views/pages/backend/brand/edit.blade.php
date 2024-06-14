@extends('layouts.app')

@section('title')
    Edit Brand
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Brand</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <form action="{{ route('brands.update', $brand->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Enter name" value="{{ $brand->name }}"
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
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
