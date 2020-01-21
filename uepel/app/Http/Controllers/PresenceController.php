<?php

namespace App\Http\Controllers;

use App\Degree;
use App\Lesson;
use App\Presence;
use App\Student;
use App\Student_list;
use App\Subject;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function create($list)
    {

        $lesson = Lesson::all();
        $list = Student_list::findOrFail($list);
        foreach ($lesson as $lessons){
            if($lessons->subject_id == $list->subject_id){
                $presence = new Presence();

                $presence->__set('student_index',$list->index);
                $presence->__set('lesson_number',$lessons->id);
                $presence->__set('subject_id',$list->subject_id);
                $presence->save();

            }
        }
    }

    public function newLesson($lesson)
    {
        $lesson = Lesson::findOrFail($lesson);
        $list = Student_list::all();
        foreach ($list as $lists)
        {
            if($lesson->subject_id == $lists->subject_id)
            {
                $presence = new Presence();

                $presence->__set('student_index',$lists->index);
                $presence->__set('lesson_number',$lesson->id);
                $presence->__set('subject_id',$lists->subject_id);
                $presence->save();
            }
        }
    }

    public function addPresenceLesson($index)
    {
        $presence = Presence::findOrFail($index);

        if(is_null(request()->input('presence')))
        {
            $presence->__set('presence',0);
        }
        else
        {
            $presence->__set('presence',1);
        }

        $presence->update();

        $subject = Subject::findOrFail($presence->subject_id);
        $student = Student::findOrFail($presence->student_index);
        $subjectDegree = 0;
        foreach($student->degree as $degrees)
        {
            if($degrees->subject_id == $presence->subject_id && is_null($degrees->lesson_number))
            {
                $subjectDegree = Degree::findOrFail($degrees->id);
                break;
            }

        }

        return view('subjects.student_details',  ['subject' => $subject, 'student'=>$student, 'subjectDegree'=>$subjectDegree]);


    }

    public function updatePresence()
    {
        $presence = Presence::all();

        foreach ($presence as $presences)
        {
            if($presences->student_index == request()->input('student_id') && $presences->lesson_number == request()->input('lesson_id') )
            {
                $presences->__set('presence',request()->input('presence'));
                $presences->update();
            }
        }
    }
}
