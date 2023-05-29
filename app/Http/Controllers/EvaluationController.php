<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use App\Models\Topic;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        $groups = Group::query()->get();

        return view('evaluation.index',compact('groups'));
    }

    public function getStudents($group_id)
    {
        $group = Group::query()->with('topics')->findOrFail($group_id);

        $students = Student::query()->where('group_id',$group_id)->with('topics')->get();

        foreach ($students as $student){
            $overall = 0;
            foreach ($student->topics as $topic)
            {
                if ($topic->pivot->score>60){
                    $overall+=$topic->pivot->score;
                }else{
                    $overall = 0;
                    break;
                }
            }

            $student['overall'] = $overall;
        }
        return view('evaluation.students',compact('group','students','overall'));
    }

    public function scoreStudent($student_id)
    {
        $student = Student::query()->with('topics')->findOrFail($student_id);

        $topics = $student->topics;


        return view('evaluation.score',compact('student','topics'));
    }

    public function store(Request $request,$student_id)
    {
        $keys = array_keys($request->all());
        $topicSync = [];
        $student = Student::query()->with('topics')->findOrFail($student_id);
        $topics = Topic::query()->whereIn('id',$keys)->get();
        foreach ($topics as $topic) {
            $topicSync[$topic->id] = ['score'=>$request[$topic->id]];
        }
        $student->topics()->sync($topicSync);
      return redirect()->route('evaluation.students',['group_id'=>$student->group_id])->with('success','score of student has created!');
    }


    public function findScores($first_score,$second_score,$group_id)
    {
        $group = Group::query()->with('topics')->findOrFail($group_id);

        $students = Student::query()->where('group_id',$group_id)->with('topics')->get();

        foreach ($students as $student){
            $overall = 0;
            foreach ($student->topics as $topic)
            {
                if ($topic->pivot->score>60){
                    $overall+=$topic->pivot->score;
                }else{
                    $overall = 0;
                    break;
                }
            }

            $student['overall'] = $overall;
        }
        return view('evaluation.find-score',compact('group','students','second_score','first_score'));
    }


}
