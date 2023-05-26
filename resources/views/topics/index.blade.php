@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Topics</h2>
        <a href="{{ route('topic.create') }}" class="btn btn-success mb-4">
            Create
        </a>
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Topic name</th>
                <th><i class="fas fa-edit"></i></th>
                <th><i class="fas fa-trash-alt"></i></th>
            </tr>
            </thead>
            <tbody>

            @foreach($topics as $topic)
                <tr>
                    <th scope="row">{{$topic->id}}</th>
                    <td>{{$topic->name}}</td>
                    <td>
                        <a href="{{ route('topic.edit', ['id' => $topic->id]) }}">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('topic.destroy', ['topic' => $topic->id]) }}"
                              method="post" onsubmit="return confirm('Are you sure delete this topic?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="far fa-trash-alt text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
