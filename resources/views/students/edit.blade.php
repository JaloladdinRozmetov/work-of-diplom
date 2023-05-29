@extends('layouts.app', ['title' => 'update student'])

@section('content')
    <div class="container">
        <h1>Update student</h1>
        <form method="post" action="{{ route('students.update',['id'=>$student->id]) }}" >
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="first_name" placeholder="First Name"
                       required  value="{{ old('first_name') ?? $student->first_name ?? '' }}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="last_name" placeholder="Last Name"
                       value="{{ old('last_name') ?? $student->last_name ?? '' }}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control w-25 d-inline mr-4" placeholder="Age"
                       name="age" required value="{{ old('age') ?? $student->age ?? '' }}">
            </div>
            <div class="form-group">
                <select name="group_id" class="form-control" title="Категория">
                    <option value="0">Выберите</option>
                    @foreach($groups as $item)
                        <option value="{{$item->id}}" @if($item->id == $student->group_id)selected @endif>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control w-25 d-inline mr-4" placeholder="Phone:"
                       name="phone_number" required value="{{ old('phone_number') ?? $student->phone_number ?? '' }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

@endsection
