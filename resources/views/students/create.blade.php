@extends('layouts.app', ['title' => 'create student'])

@section('content')
    <div class="container">
        <h1>Create new student</h1>
    <form method="post" action="{{ route('students.store') }}" >
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
            <input type="number" class="form-control w-25 d-inline mr-4" placeholder="Age"
                   name="age" required value="{{ old('age') ?? $student->age ?? '' }}">
        </div>
        <div class="form-group">
            <select name="group_id" class="form-control" title="Категория">
                <option value="0">Выберите</option>
                    @foreach($groups as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
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
