@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$student->first_name}} {{$student->last_name}}</h2>

        <form action="{{route('evaluation.store',['student_id'=>$student->id])}}" method="post">
            @csrf
            @foreach($topics as $topic)
                <div class="form-group">
                    <label for="{{$topic->name}}">{{$topic->name}}</label>
                    <input class="form-control" value="{{ old($topic->id) ?? $topic->pivot->score ?? '' }}" type="number" max="100" name="{{$topic->id}}">
                </div>
            @endforeach
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
