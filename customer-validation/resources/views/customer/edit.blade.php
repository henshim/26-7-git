@extends('layout.master')
@section('title','update customer')
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Update customer</h3>
            </div>
            <div class="card-body">
                <form action="{{route('customers.update')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$customer[0]->id}}">
                    <div class="">
                        <div class="form-group">
                            <label>User name</label>
                            <input type="text" class="form-control" name="name" value="{{$customer[0]->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{$customer[0]->email}}">
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" value="{{$customer[0]->address}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('customers.list') }}" class="btn btn-secondary">Back</a>
                </form>

            </div>
        </div>
    </div>
@endsection
