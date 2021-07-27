@extends('layout.master')
@section('title','add product')
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add product</hh3>
            </div>
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        <div class="form-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                   placeholder="product name">
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <input type="number" class="form-control  @error('price') is-invalid @enderror" name="price"
                                   placeholder="price">
                            @error('price')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                           <select name="cate_id" id="">
                               @foreach($cates as $cate)
                               <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control"
                               name="img" placeholder="address">
                        @error('img')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-info btn-fill">Save</button>
                    <a href="{{ route('product.list') }}" class="btn btn-secondary">Back</a>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection
