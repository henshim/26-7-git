@extends('layout.master')
@section('content')
<div class="card" style="width: 18rem;">
    <div class="card-header">
        {{$customer[0]->name}}
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">{{$customer[0]->email}}</li>
        <li class="list-group-item">{{$customer[0]->address}}</li>
    </ul>
</div>
@endsection
