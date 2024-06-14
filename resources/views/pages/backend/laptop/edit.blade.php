@extends('layouts.app')

@section('title')
    Edit Laptop
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Laptop</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <form action="{{ route('laptops.update', $laptop->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label>Brand</label>
                        <select name="brand_id" id="basic-usage" class="form-control @error('brand_id') is-invalid @enderror">
                            <option value="">-- Select brand --</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" @if ($brand->id == $laptop->brand_id) selected @endif>
                                    {{ $brand->name }}</option>
                            @endforeach
                        </select>
                        @error('brand_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Enter name" value="{{ $laptop->name }}"
                            class="form-control" @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" placeholder="Enter description"
                            value="{{ $laptop->description }}" class="form-control"
                            @error('description') is-invalid @enderror">
                        @error('description')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Processor</label>
                                <input type="text" name="processor" placeholder="Enter processor"
                                    value="{{ $laptop->processor }}" class="form-control"
                                    @error('processor') is-invalid @enderror">
                                @error('processor')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>RAM</label>
                                <input type="text" name="ram" placeholder="Enter ram" value="{{ $laptop->ram }}"
                                    class="form-control" @error('ram') is-invalid @enderror">
                                @error('ram')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Storage</label>
                                <input type="text" name="storage" placeholder="Enter storage"
                                    value="{{ $laptop->storage }}" class="form-control"
                                    @error('storage') is-invalid @enderror">
                                @error('storage')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>GPU</label>
                                <input type="text" name="gpu" placeholder="Enter gpu" value="{{ $laptop->gpu }}"
                                    class="form-control" @error('gpu') is-invalid @enderror">
                                @error('gpu')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Display</label>
                                <input type="text" name="display" placeholder="Enter display"
                                    value="{{ $laptop->display }}" class="form-control"
                                    @error('display') is-invalid @enderror">
                                @error('display')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Price (Rp)</label>
                                <input type="number" name="price" placeholder="Enter price" value="{{ $laptop->price }}"
                                    class="form-control" @error('price') is-invalid @enderror">
                                @error('price')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Quantity (Unit)</label>
                                <input type="number" name="quantity" placeholder="Enter quantity"
                                    value="{{ $laptop->quantity }}" class="form-control"
                                    @error('quantity') is-invalid @enderror">
                                @error('quantity')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Released At</label>
                                <input type="date" name="released_at" placeholder="Enter released_at"
                                    value="{{ $laptop->released_at }}" class="form-control"
                                    @error('released_at') is-invalid @enderror">
                                @error('released_at')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" value="{{ old('image') }}" class="form-control"
                            @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('laptops.index') }}" class="btn btn-secondary">
                        <span class="text">Cancel</span>
                    </a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
