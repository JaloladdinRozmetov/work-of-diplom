@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Students</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Student</th>
                <th scope="col">Phone number</th>
                @for($i=0;$i<$topicsCount;$i++)
                    <th scope="col"></th>
                @endfor
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($students as $student)
            <tr>
                <th scope="row">{{$student->id}}</th>
                <td>{{$student->first_name}} {{$student->last_name}}</td>
                <td>{{$student->phone_number}}</td>
                    <?php $count = 0; ?>
                @foreach($student->topics as $topic)
                    <?php $count+=$topic->pivot->score; ?>
                    <td>{{$topic->pivot->score}}</td>
                @endforeach
                <td>{{$count}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
