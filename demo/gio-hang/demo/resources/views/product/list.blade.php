@extends('layout.master')
@section('title','customer list')
@section('content')
    <div class="col-md-12">
        <a href="{{ route('product.add') }}" class="btn btn-success">Add Customer</a>
        <div class="card strpied-table-with-hover">
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="">
                    <tr>
                        <th>ID</th>
                        <th>Img</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td scope="row">{{$product->id}}</td>
                            <td><img width='100px' src="{{asset('storage/'.$product->img)}}" alt="{{$product->img}}"></td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->cateName}}</td>
                            <td>
                                <a href=""
                                   class="btn btn-success">Detail</a>
                                <a href="{{ route('product.update',$product->id) }}"
                                   class="btn btn-warning">Update</a>
                                <a href=""
                                   onclick="confirm('Are you sure about that ???')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No data</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                {{--{{ $products->links() }} --}}
            </div>
        </div>
    </div>
@endsection
