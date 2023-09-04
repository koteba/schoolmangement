<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classes;
use App\Models\Mark;
use Illuminate\Http\Request;
use Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->query('search_student') !== null) {
            $search = $request->input('search_student');
             $students = Student::join('classes', 'students.classes_id', '=', 'classes.classes_id')
             ->where('students.name', 'LIKE', "{$search}")
            ->orwhere('students.student_id', 'LIKE', "{$search}")
                 ->paginate(25, array('students.student_id as student_id', 'students.name as name', 'students.birth_date as birth_date', 'students.address as address','students.picture as picture', 'classes.name as classes'))->withQueryString();
       }
       elseif ($request->query('to_date') !== null) {
        $to_date = $request->input('to_date');
        $from_date = $request->input('from_date');
        $students = Student::join('classes', 'students.classes_id', '=', 'classes.classes_id')
        ->where('students.birth_date', '>=',"{$from_date}")
        ->where('students.birth_date', '<=',"{$to_date}")
        ->paginate(25, array('students.student_id as student_id', 'students.name as name', 'students.birth_date as birth_date', 'students.address as address', 'students.picture as picture', 'classes.name as classes'))->withQueryString();

    }
       else {
        //$search = $request->input('search_student');
         $students = Student::join('classes', 'students.classes_id', '=', 'classes.classes_id')
             ->paginate(25, array('students.student_id as student_id', 'students.name as name', 'students.birth_date as birth_date', 'students.address as address','students.picture as picture', 'classes.name as classes'))->withQueryString();
   }
        //$students=Student::all();
        return view('student.index')->with('students',$students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classeses=Classes::all();
        return view('student.create')->with('classeses',$classeses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'picture' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);
        if($request->file('picture')){
            $file= $request->file('picture');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/storage/students'), $filename);
        }
  
     $student=Student::create([
         "name"=>$request->name,
         "birth_date"=>$request->birth_date,
         "address"=>$request->address,
         "picture"=>$filename,
         "classes_id"=>$request->classes_id,
    
     ]);
     $request->session()->flash('success','تم الإضافة بنجاح');

     return redirect(route('student.index'))->with('students', Student::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $classeses=Classes::all();
        $student=Student::find($id);
        return view('student.details')->with('student',$student)->with('classeses',$classeses);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $classeses=Classes::all();
        $student=Student::find($id);
        return view('student.update')->with('student',$student)->with('classeses',$classeses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student=Student::find($id);
        $request->validate([
            'picture' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);
        if ($request->hasFile('picture')) {
            $file= $request->file('picture');
            $file= delete();
            $fileName= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('students'), $fileName);
          
        }else{
            $fileName=$student->picture;
        }
    $student->update([
            "name"=>$request->name,
            "birth_date"=>$request->birth_date,
            "address"=>$request->address,
            "picture"=>$fileName,
         "classes_id"=>$request->classes_id,
           ]);
    $request->session()->flash('Update','تم التعديل بنجاح');

     return redirect(route('student.index'))->with('students', Student::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $student=Student::find($id);
        $mark=Mark::join('students','marks.student_id','=','students.student_id')->where('students.student_id','=',$id)->count();
//dd($mark);
       // $mark=Mark::join('students','marks.student_id','=',$id);
        if($mark){
        $request->session()->flash('no_delete',' لا يمكنك حذف طالب ويوجد علامات مرتبطة به');

       }
     else{
        // Storage::disk('public')->delete('/storage/image'. $post['image']);
    //     Post::where('id', $id)->delete();
        Storage::disk('public')->delete('/storage/students/'.$student['picture']);
        $student->delete();
    $request->session()->flash('Delete','تم الحذف بنجاح');
    }

     return redirect(route('student.index'))->with('students', Student::all());
    }
}
