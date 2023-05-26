@extends('layouts.app', ['title' => 'create topic'])

@section('content')
    <div class="container">
        <h1>Update topic</h1>
        <form method="post" action="{{ route('topic.update',['id'=>$topic->id]) }}" >
            @csrf
            <div class="form-group">
                <label for="name">Name of topic</label>
                <input type="text" id="name" class="form-control" name="name" placeholder="Topic name"
                       required  value="{{ old('name') ?? $topic->name ?? '' }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

@endsection
