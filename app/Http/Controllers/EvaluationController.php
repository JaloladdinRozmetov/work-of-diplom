<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use App\Models\Topic;
use Illuminate\Http\Request;
use Mockery\Exception;
use mysql_xdevapi\Collection;

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



    public function correlationGroup()
    {
        $groups = Group::query()->get();

        foreach ($groups as $group_1)
        {
            foreach ($groups as $group_2){
            if($group_1->id !== $group_2->id) {
                $students_1 = Student::query()->where('group_id', $group_1->id)->with('topics')->get();
                $students_2 = Student::query()->where('group_id', $group_2->id)->with('topics')->take(count($students_1))->get();

                foreach ($students_1 as $student_1) {
                    $overall_1 = 0;
                    foreach ($student_1->topics as $topic) {
                        if ($topic->pivot->score > 60) {
                            $overall_1 += $topic->pivot->score;
                        } else {
                            $overall_1 = 0;
                            break;
                        }
                    }
                    $student_1['overall'] = $overall_1 / count($student_1->topics);
                }
                foreach ($students_2 as $student_2) {
                    $overall_2 = 0;
                    foreach ($student_2->topics as $topic) {
                        if ($topic->pivot->score > 60) {
                            $overall_2 += $topic->pivot->score;
                        } else {
                            $overall_2 = 0;
                            break;
                        }
                    }
                    $student_2['overall'] = $overall_2 / count($student_2->topics);
                }

                if (count($students_1)===count($students_2)) {
                    $group_1['R-' . $group_2->id] = $this->correlation($students_1, $students_2);
                }else
                {
                    return 1;
                }
             }else
             {
                 $group_1['R-' . $group_2->id] = "#";
             }
            }
        }
        return view('evaluation.evaluation-group',compact('groups'));
    }

    public function correlation( $students_1, $students_2)
    {
        $n = count($students_1);

        $array = [];
        $keys=[];
        $xy = 0;
        $x = 0;
        $y = 0;
        $x2 = 0;
        $y2 = 0;
        foreach ($students_1 as $student_1)
        {
           array_push($array,$student_1->overall);
        }
        foreach ($students_2 as $student_2)
        {
            array_push($keys,$student_2->overall);
        }

            $newArray = array_combine($keys,array_values($array));

        foreach ($newArray as $key => $item)
        {
            $xy += $key*$item;
            $x += $key;
            $y += $item;
            $x2 += $key*$key;
            $y2 += $item*$item;
        }

        $R = ($n*$xy-$x*$y)/sqrt(($n*$x2-$x*$x)*($n*$y2-$y*$y));


        return $R;
    }

}
