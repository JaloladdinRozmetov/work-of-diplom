<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $topics = Topic::query()->get();

        return view('topics.index',compact('topics'));
    }

    public function create()
    {
        return view('topics.create');
    }

    public function edit($id)
    {
        $topic = Topic::query()->findOrFail($id);

        return view('topics.edit',compact('topic'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required:string'
        ]);

         Topic::query()->create([
            'name' => $request->name
        ]);

        return redirect()
            ->route('topic.index')
            ->with('success', 'Success created new topic!');
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required:string'
        ]);

        Topic::query()->find($id)->update([
            'name' => $request->name
        ]);

        return redirect()->route('topic.index')->with('success','topic has changed!');
    }

    public function delete($id)
    {
        Topic::query()->findOrFail($id)->delete();

        return redirect()->route('topic.index')->with('success','topic has deleted!');
    }

}
