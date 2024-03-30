<!-- resources/views/products/index.blade.php -->

@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product List</div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Images</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>
                                    @foreach(explode(',', $product->img) as $image)
                                        <img src="{{ asset($image) }}" alt="Product Image" style="max-width: 100px;">
                                    @endforeach
                                </td>
                                <td>{{ $product->prod_name }}</td>
                                <td>{{ $product->prod_desc }}</td>
                                <td>{{ $product->type }}</td>
                                <td>${{ $product->price }}</td>
                                <td>
                                    @if ($product->deleted_at == null)                                                                        

                                    
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                    <form method="POST" action="{{ route('product.delete', $product->id) }}" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                    </form>
                                    @else
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                    <form method="GET" action="{{ route('product.restore', $product->id) }}" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to restore this product?')">Restore</button>
                                    </form>
                                    <form method="POST" action="{{ route('product.destroy', $product->id) }}" style="display:inline">
                                     @csrf
                                    @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to permanently delete this product?')">Permanently Delete</button>
                                </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
