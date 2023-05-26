@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Students</h2>
        <a href="{{ route('students.create') }}" class="btn btn-success mb-4">
            Create
        </a>
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Student</th>
                <th scope="col">Phone number</th>
                <th scope="col">Age</th>
                <th scope="col">Group</th>
                <th><i class="fas fa-edit"></i></th>
                <th><i class="fas fa-trash-alt"></i></th>
            </tr>
            </thead>
            <tbody>

            @foreach($students as $student)
            <tr>
                <th scope="row">{{$student->id}}</th>
                <td><a href="{{route('students.show',['id'=>$student->id])}}">{{$student->first_name}} {{$student->last_name}}</a></td>
                <td>{{$student->phone_number}}</td>
                <td>{{$student->age}}</td>
                <td>{{$student->group->name}}</td>

                <td>
                    <a href="{{ route('students.edit', ['id' => $student->id]) }}">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
                <td>
                    <form action="{{ route('students.destroy', ['student' => $student->id]) }}"
                          method="post" onsubmit="return confirm('Удалить этот студент?')">
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
