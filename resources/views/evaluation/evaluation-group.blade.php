@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Correlation by group</h2>
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                @foreach($groups as $group)
                    <th scope="col">{{$group->name}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>

            @foreach($groups as $group)
                <tr>
                    <th scope="row">{{$group->name}}</th>
                    @foreach($groups as $item)
                        <td>{{$group['R-'.$item->id]}}</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
