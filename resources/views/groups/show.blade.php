@extends('layouts.app', ['title' => 'Show group'])

@section('content')
    <div class="container">
        <h1>Group</h1>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Name:</strong> {{ $group->name }}</p>
            </div>

            <div class="col-md-12">
                <h2>Topics of group</h2>
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">Topic name</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($group->topics as $topic)
                        <tr>
                            <th scope="row">{{$topic->id}}</th>
                            <td>{{$topic->name}}</td>
                            <td>{{$topic->pivot->created_at}}</td>
                            <td>{{$topic->pivot->score}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <h2>Students of group</h2>
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Phone number</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($group->students as $student)
                        <tr>
                            <th scope="row">{{$student->id}}</th>
                            <td><a href="{{route('students.show',['id'=>$student->id])}}">{{$student->first_name}}</a></td>
                            <td>{{$student->last_name}}</td>
                            <td>{{$student->phone_number}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
{{--                <a href="{{ route('group.edit', ['id' => $group->id]) }}"--}}
{{--                   class="btn btn-success">--}}
{{--                    Update group--}}
{{--                </a>--}}
                <form method="post" class="d-inline" onsubmit="return confirm('Delete this group?')"
                      action="{{ route('group.destroy', ['group' => $group->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
