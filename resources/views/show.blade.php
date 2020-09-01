@extends('layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <p><h2>{{$ad->title}}</h2></p>
            <p><h3>{{$ad->description}}</h3></p>
        </div>
    </div>
    <div class="card-footer text-muted">
        {{$ad->created_at->diffForHumans()}} by {{$ad->user->username}}
    </div>
    @can('delete', $ad)
        <a href="{{route('delete',[$ad->id])}}" class="btn btn-primary" style="float: right">Delete</a>
    @endcan
        <a href="{{ url()->previous() }}"type="submit" class="btn btn-primary">Back</a>
@endsection
