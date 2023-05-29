<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Topic;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        $groups = Group::query()->get();

        return view('groups.index',compact('groups'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $topics = Topic::query()->get();

        return view('groups.create',compact('topics'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $group = Group::query()->with('topics')->findOrFail($id);
        $topics = Topic::query()->get();

        return view('groups.edit',compact('group','topics'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required:string',
        ]);

        $group = Group::create([
            'name' => $request->name,
        ]);
        Group::query()->find($group->id)->topics()->attach($request->topics);
        return redirect()
            ->route('group.show', ['id' => $group->id])
            ->with('success', 'Success created new group!');
    }

//    public function update(Request $request,$id)
//    {
//        $this->validate($request,[
//            'name' => 'required',
//        ]);
//
//        Group::query()->find($id)->update([
//            'name' => $request->name,
//        ]);
//        Group::query()->find($id)->topics()->sync($request->topics);
//
//        return redirect()
//            ->route('group.show', ['id' => $id])
//            ->with('success', 'Successful updated');
//    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $group = Group::query()->with('students','topics')->findOrFail($id);

        return view('groups.show',compact('group'));
    }

    public function delete($id)
    {
            Group::query()->find($id)->delete();

            return redirect()->route('group.index')->with('success','Success deleted!');
    }
}
