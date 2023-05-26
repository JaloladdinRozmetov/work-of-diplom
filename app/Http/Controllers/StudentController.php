<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use App\Models\Topic;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $students = Student::query()->with('group')->get();

        return view('students.index',compact('students'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $groups = Group::query()->get();

        return view('students.create',compact('groups'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $student = Student::query()->findOrFail($id);

        $groups = Group::query()->get();

        return view('students.edit',compact('student','groups'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'age' => 'required:int',
            'group_id' => 'required',
            'phone_number' => 'required',
        ]);

        $group = Group::query()->with('topics')->find($request->group_id);

        $student = Student::create([
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
          'age' => $request->age,
          'phone_number' => $request->phone_number,
          'group_id' => $request->group_id,
        ]);

        $student->topics()->attach($group->topics);

        return redirect()
            ->route('students.show', ['id' => $student->id])
            ->with('success', 'Новый студент успешно создан');
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'age' => 'required:int',
            'group_id' => 'required',
            'phone_number' => 'required',
        ]);
        $student = Student::find($id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'phone_number' => $request->phone_number,
            'group_id' => $request->group_id,
        ]);
        return redirect()
            ->route('students.show', ['id' => $id])
            ->with('success', 'Successful updated');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $student = Student::query()->with('group','topics')->findOrFail($id);

        return view('students.show',compact('student'));
    }

    public function destroy($id)
    {
        Student::query()->findOrFail($id)->delete();

        return redirect()->back()->with('success','Student has deleted!');
    }
}
