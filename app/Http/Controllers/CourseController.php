<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\Mark;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->query('search_courae') !== null) {
            $search = $request->input('search_courae');
             $courses = Course::join('teachers', 'courses.teacher_id', '=', 'teachers.teacher_id')
             ->where('courses.name', '=', "{$search}")
            ->orwhere('teachers.name', '=', "{$search}")
                 ->paginate(25, array('courses.course_id as course_id', 'courses.name as course', 'teachers.name as teacher'))->withQueryString();
       }
       else {
        $courses = Course::join('teachers', 'courses.teacher_id', '=', 'teachers.teacher_id')
        ->paginate(25, array('courses.course_id as course_id', 'courses.name as course', 'teachers.name as teacher'))->withQueryString();
   }
        return view('course.index')->with('courses',$courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers=Teacher::all();
        return view('course.create')->with('teachers',$teachers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course=Course::create([
            "name"=>$request->name,
            "teacher_id"=>$request->teacher_id,
       
        ]);
        $request->session()->flash('success','تم الإضافة بنجاح');
   
        return redirect(route('course.index'))->with('courses', Course::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $teachers=Teacher::all();
        $course=Course::find($id);
        return view('course.details')->with('course',$course)->with('teachers',$teachers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $teachers=Teacher::all();
        $course=Course::find($id);
        return view('course.update')->with('course',$course)->with('teachers',$teachers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course=Course::find($id);

        $course->update([
            "name"=>$request->name,
            "teacher_id"=>$request->teacher_id,
           ]);
    $request->session()->flash('Update','تم التعديل بنجاح');

     return redirect(route('course.index'))->with('courses', Course::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $course=Course::find($id);
        $mark=Mark::join('courses','marks.course_id','=','courses.course_id')->where('courses.course_id','=',$id)->count();
        if($mark){
        $request->session()->flash('no_delete',' لا يمكنك حذف مقرر ويوجد علامات مرتبطة به');


        }
        else{
            $course->delete();
            $request->session()->flash('Delete','تم الحذف بنجاح');
        }
     return redirect(route('course.index'))->with('courses', Course::all());
    }
}
