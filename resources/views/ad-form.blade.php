@extends('layout')

@section('content')
    <form method="POST" action="{{route('create')}}">
        @csrf
        <div class="form-group">
            <label for="title">Ad Title</label>
            @error('title')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror
            <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp" value="{{old('title')}}">
            <small id="titleHelp" class="form-text text-muted">Title</small>
        </div>
        <div class="form-group">
            <label for="description"> AD Description </label>
            @error('description')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror
            <textarea class="form-control" name="description" id="description" rows="5">{{old('description')}}</textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Create"/>
    </form>
@endsection
