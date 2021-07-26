@extends('layout.master')
@section('title','add customer')
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add customer</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="">
                        <div class="form-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                   placeholder="customer name">
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email"
                                   placeholder="email">
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                   name="address" placeholder="address">
                            @error('address')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info btn-fill">Save</button>
                    <a href="{{ route('customers.list') }}" class="btn btn-secondary">Back</a>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection
