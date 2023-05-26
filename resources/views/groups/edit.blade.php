@extends('layouts.app', ['title' => 'create group'])

@section('content')
    <div class="container">
        <h1>Update group</h1>
        <form method="post" action="{{ route('group.update',['id'=>$group->id]) }}" >
            @csrf
            <div class="form-group">
                <label for="name">Name of group</label>
                <input type="text" id="name" class="form-control" name="name" placeholder="Group name"
                       required  value="{{ old('name') ?? $group->name ?? '' }}">
            </div>

            @foreach($topics as $topic)
                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           value="{{$topic->id}}"
                           name="topics[]"
                           id="{{$topic->id}}"
                    @foreach($group->topics as $item)
                           @if($item->id == $topic->id)
                               checked
                        @endif
                        @endforeach
                    >
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
