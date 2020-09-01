@extends('layout')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{\Illuminate\Support\Facades\Session::get('success')}}
        </div>
    @endif
    @forelse($ads as $ad)
        <div class="card" style="margin-bottom: 20px">
            <div class="card-body">
                <h5 class="card-title"><a href="{{route('show', [$ad->id])}}">{{$ad->title}}</a></h5>
                <p class="card-text">{{$ad->description}}</p>

                @can('update', $ad)
                    <a href="{{route('edit',[$ad->id])}}" class="btn btn-primary">Edit</a>
                @endcan
                @can('delete', $ad)
                    <a href="{{route('delete',[$ad->id])}}" class="btn btn-primary">Delete</a>
                @endcan
            </div>
            <div class="card-footer text-muted">
                {{$ad->created_at->diffForHumans()}} by {{$ad->user->username}}
            </div>
        </div>
    @empty
        <p>No Ads.</p>
    @endforelse
    {{$ads->links()}}
@endsection
