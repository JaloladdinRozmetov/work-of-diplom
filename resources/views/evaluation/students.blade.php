@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$group->name}}</h2>
        <a href="{{route('evaluation.find.score',['first_score'=>0,'second_score'=>60,'group_id'=>$group->id])}}" type="button" class="btn btn-danger">Score 2</a>
        <a href="{{route('evaluation.find.score',['first_score'=>60,'second_score'=>70,'group_id'=>$group->id])}}" type="button" class="btn btn-warning">Score 3</a>
        <a href="{{route('evaluation.find.score',['first_score'=>70,'second_score'=>90,'group_id'=>$group->id])}}" type="button" class="btn btn-primary">Score 4</a>
        <a href="{{route('evaluation.find.score',['first_score'=>90,'second_score'=>100,'group_id'=>$group->id])}}" type="button" class="btn btn-success">Score 5</a>
        <table class="table table-hover">
            <tr>
                <th>#id</th>
                <th>#Name</th>
                @foreach($group->topics as $topic)
                    <th>{{ Str::limit($topic->name, $limit = 10, $end = '...') }}</th>
                @endforeach
                <th>Overall</th>
                <th>#</th>
            </tr>

            @foreach($students as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->first_name}}</td>
                <?php
                $count = count($student->topics);
                ?>
                @foreach($student->topics as $item)
                    <td>
                        {{$item->pivot->score}}
                    </td>
                @endforeach
                @if($student->overall===0)
                    <td>0</td>
                @else
                    <td>{{ number_format($student->overall/$count)}}</td>
                @endif
                <td><a href="{{route('evaluation.score',['student_id'=>$student->id])}}" type="button" class="btn btn-primary">+</a></td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
