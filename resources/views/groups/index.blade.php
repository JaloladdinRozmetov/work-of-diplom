@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Groups</h2>
        <a href="{{ route('group.create') }}" class="btn btn-success mb-4">
            Create
        </a>
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Group name</th>
                <th><i class="fas fa-edit"></i></th>
                <th><i class="fas fa-trash-alt"></i></th>
            </tr>
            </thead>
            <tbody>

            @foreach($groups as $group)
                <tr>
                    <th scope="row">{{$group->id}}</th>
                    <td><a href="{{route('group.show',['id'=>$group->id])}}">{{$group->name}}</a></td>
                    <td>
                        <a href="{{ route('group.edit', ['id' => $group->id]) }}">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('group.destroy', ['group' => $group->id]) }}"
                              method="post" onsubmit="return confirm('Are you sure delete this group?')">
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
