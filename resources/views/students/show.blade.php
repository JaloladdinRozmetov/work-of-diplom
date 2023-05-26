@extends('layouts.app', ['title' => 'Show student'])

@section('content')
    <div class="container">
    <h1>Student</h1>
    <div class="row">
        <div class="col-md-6">
            <p><strong>First name:</strong> {{ $student->first_name }}</p>
            <p><strong>Last name:</strong> {{ $student->last_name }}</p>
        </div>
        <div class="col-md-6">
            <p><strong>Age:</strong> {{$student->age}}</p>
            <p><strong>Group:</strong> {{$student->group->name}}</p>
            <p><strong>Phone number:</strong> {{$student->phone_number}}</p>
        </div>
        <div class="col-md-8">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">#Id</th>
                    <th scope="col">Topic name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Evaluation</th>
                </tr>
                </thead>
                <tbody>

                @foreach($student->topics as $topic)
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
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('students.edit', ['id' => $student->id]) }}"
               class="btn btn-success">
                Update student
            </a>
            <form method="post" class="d-inline" onsubmit="return confirm('Delete this student?')"
                  action="{{ route('students.destroy', ['student' => $student->id]) }}">
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
