@extends('layouts.app', ['title' => 'create group'])

@section('content')
    <div class="container">
        <h1>Create new group</h1>
        <form method="post" action="{{ route('group.store') }}" >
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Group name"
                       required  value="{{ old('name') ?? $group->name ?? '' }}">
            </div>

          @foreach($topics as $topic)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{$topic->id}}" name="topics[]" id="{{$topic->id}}" >
                <label class="form-check-label" for="{{$topic->id}}">
                    {{$topic->name}}
                </label>
            </div>
            @endforeach
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

@endsection
