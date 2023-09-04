<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes=Classes::all();
        return view('classes.index')->with('classess',$classes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Classes::create([
            "name"=>$request->name,
       
        ]);
        $request->session()->flash('success','تم الإضافة بنجاح');
   
        return redirect(route('classes.index'))->with('classess', Classes::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $classes=Classes::find($id);
        return view('classes.details')->with('classes',$classes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $classes=Classes::find($id);
        return view('classes.update')->with('classes',$classes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $classes=Classes::find($id);

        $classes->update([
            "name"=>$request->name,
            "birth_date"=>$request->birth_date,
            "address"=>$request->address,
           ]);
    $request->session()->flash('Update','تم التعديل بنجاح');

     return redirect(route('classes.index'))->with('classess', Classes::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $classes=Classes::find($id);
        $student=Student::join('classes','classes.classes_id','=','students.classes_id')->where('students.classes_id','=',$id)->count();
        if($student){
            $request->session()->flash('no_delete',' لا يمكنك حذف صف ويوجد طلاب مرتبطة به');

   
        }
        else{
            $classes->delete();
            $request->session()->flash('Delete','تم الحذف بنجاح');
        }
  

     return redirect(route('classes.index'))->with('classess', Classes::all());
    }
}
