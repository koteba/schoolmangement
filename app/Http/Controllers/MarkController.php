<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->query('search_teacher') !== null) {
            $search = $request->input('search_teacher');
             $marks = Teacher::join('courses', 'teachers.teacher_id', '=', 'courses.teacher_id')
             ->join('marks','courses.course_id','=','marks.course_id')
             ->join('students','marks.student_id','=','students.student_id')
            ->where('courses.name', 'LIKE', "{$search}")
            ->where('marks.mark', '>', 60)

                 ->paginate(25, array('teachers.teacher_id as teacher_id', 'marks.mark as mark','marks.mark_id as mark_id', 'courses.name as course', 'students.name as name'));
     
                }
       elseif ($request->query('search_mark') !== null) {
           $search = $request->input('search_mark');
            $marks = Student::join('marks', 'students.student_id', '=', 'marks.student_id')
            ->join('courses','marks.course_id','=','courses.course_id')
           ->where('students.name', 'LIKE', "{$search}")
           ->orwhere('courses.name', 'LIKE', "{$search}")
                ->paginate(25, array('students.student_id as student_id', 'marks.mark as mark','marks.mark_id as mark_id', 'courses.name as course', 'students.name as name'))->withQueryString();
      }
      else {
         $marks = Student::join('marks', 'students.student_id', '=', 'marks.student_id')
         ->join('courses','marks.course_id','=','courses.course_id')
             ->paginate(25, array('students.student_id as student_id', 'marks.mark as mark','marks.mark_id as mark_id', 'courses.name as course', 'students.name as name'))->withQueryString();
   }
      //  $marks=Mark::all();
       return view('mark.index')->with('marks',$marks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::all();
        $students=Student::all();
        return view('mark.create')->with('courses',$courses)->with('students',$students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mark=Mark::create([
            "mark"=>$request->mark,
            "student_id"=>$request->student_id,
            "course_id"=>$request->course_id,
       
        ]);
        $request->session()->flash('success','تم الإضافة بنجاح');
   
        return redirect(route('mark.index'))->with('marks', Mark::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courses=Course::all();
        $students=Student::all();
        $mark=Mark::find($id);
        return view('mark.details')->with('mark',$mark)->with('students',$students)->with('courses',$courses);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses=Course::all();
        $students=Student::all();
        $mark=Mark::find($id);
        return view('mark.update')->with('mark',$mark)->with('students',$students)->with('courses',$courses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mark=Mark::find($id);

        $mark->update([
            "mark"=>$request->mark,
            "student_id"=>$request->student_id,
            "course_id"=>$request->course_id,
           ]);
    $request->session()->flash('Update','تم التعديل بنجاح');

     return redirect(route('mark.index'))->with('marks', Mark::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $mark=Mark::find($id);
        $mark->delete();
    $request->session()->flash('Delete','تم الحذف بنجاح');

     return redirect(route('mark.index'))->with('marks', Mark::all());
    }
}
