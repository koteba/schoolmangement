<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Course;
use Illuminate\Http\Request;

class TeacherController extends Controller
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
             $teachers = Teacher::where('teachers.name', 'LIKE', "{$search}")
            ->orwhere('teachers.teacher_id', 'LIKE', "{$search}")
                 ->paginate(25, array('teachers.teacher_id as teacher_id', 'teachers.name as name', 'teachers.birth_date as birth_date', 'teachers.address as address'))->withQueryString();
       }
       else {
          $teachers = Teacher::all();
    }
      //  $teachers=Teacher::all();
        return view('teacher.index')->with('teachers',$teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers=Teacher::all();
        return view('teacher.create')->with('$teachers',$teachers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Teacher::create([
            "name"=>$request->name,
            "birth_date"=>$request->birth_date,
            "address"=>$request->address,
       
        ]);
        $request->session()->flash('success','تم الإضافة بنجاح');
   
        return redirect(route('teacher.index'))->with('teachers', Teacher::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $teacher=Teacher::find($id);
        return view('teacher.details')->with('teacher',$teacher);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $teacher=Teacher::find($id);
        return view('teacher.update')->with('teacher',$teacher);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teacher=Teacher::find($id);

        $teacher->update([
            "name"=>$request->name,
            "birth_date"=>$request->birth_date,
            "address"=>$request->address,
           ]);
    $request->session()->flash('Update','تم التعديل بنجاح');

     return redirect(route('teacher.index'))->with('teachers', Teacher::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $teacher=Teacher::find($id);
        $course=Course::join('teachers','courses.teacher_id','=','teachers.teacher_id')->where('teachers.teacher_id','=',$id)->count();
        if($course){
            $request->session()->flash('no_delete',' لا يمكنك حذف مدرس ويوجد مواد مرتبطة به');

   
        }
        else{
            $teacher->delete();
            $request->session()->flash('Delete','تم الحذف بنجاح');
        }
     return redirect(route('teacher.index'))->with('teachers', Teacher::all());
    }
}
