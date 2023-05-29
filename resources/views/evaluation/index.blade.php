@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($groups as $group)
        <a href="{{route('evaluation.students',['group_id'=>$group->id])}}" type="button" class="btn btn-primary">{{$group->name}}</a>
    @endforeach
</div>
@endsection
