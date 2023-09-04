@include('main')
<div class="container" style="margin-top: 40px;" dir="rtl">
            <div class="row ">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row pb-1">
                                <div class="col-md-4">
                                <h6 class="m-2 font-weight-bold text-primary" style="font-family: doridregular, Arial !important;font-size: 20px;"><strong>بيانات الطلاب</strong></h6>
                                </div>
                                <div class="col-md-8">
                                <a href="{{route('student.create')}}" class="btn btn-outline-success ms-2" style="float:left;">أضافة <i class="bi bi-plus-circle-dotted" style="font-size: 20px;"></i></a>
                                <a href="{{route('student.index')}}" class="btn btn-outline-info ms-2" style="float:left;">تحديث<i class="bi bi-arrow-clockwise" style="font-size: 20px;"></i></a>

                                </div>
                            </div>
                            <hr>
                            <div class="row" style="margin-top:14px;">
                                <div class="col-md-6">
                                    <form action="{{ route('student.index') }}" method="GET">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" name="search_student" value="" required class="form-control rounded"
                                                placeholder=" بحث حسب الاسم" />
                                            <button type="submit" class="btn btn-primary rtl">بحث</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row" style="margin-top:14px;">
                                <div class="col-md-4">
                                    <form action="#" method="GET">
                                        @csrf

                                        <div class="input-group">
                                            <input type="date" name="from_date"  required class="form-control rounded"  placeholder="بحث حسب تاريخ الادخال  " />
                                            <button type="" class="btn btn-primary">مــن</button>
                                        </div>
                                </div>
                                <div class="col-md-4" >
                                    <div class="input-group">
                                        <input type="date" name="to_date"  required  class="form-control rounded" placeholder="بحث حسب تاريخ الادخال  " />
                                        <button type="submit" class="btn btn-primary">الــى</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
            @include('includes.message')
                 
         
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center" scope="col">#</th>
                                            <th style="text-align:center" scope="col">الاسم </th>
                                            <th style="text-align:center" scope="col"> تاريخ الميلاد </th>
                                            <th style="text-align:center" scope="col">الصورة</th>
                                            <th style="text-align:center" scope="col">الصف</th>
                                            <th style="text-align:center" scope="col">العنوان</th>
                                             <th style="text-align:center" scope="col">تعديل</th>
                                            <th style="text-align:center" scope="col">تفاصيل </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($students as $student)
                                        <tr>
                                            <td style="text-align:center">{{$student->student_id}}</td>
                                            <td style="text-align:center">{{$student->name}}</td>
                                            <td style="text-align:center">{{$student->birth_date}}</td>
                                            <td style="text-align:center"><img width="90"  height="50" src="{{URL::asset('storage/students/'.$student->picture)}}"></td>
                                            <td style="text-align:center">{{$student->classes}}</td>
                                            <td style="text-align:center">{{$student->address}}</td>


                                                <td style="text-align:center"><a href="{{route('student.edit',$student->student_id)}}"><i class="bi bi-pencil-square text-success" style="font-size: 20px;"></i></a></td>
                                                <td style="text-align:center"><a href="{{route('student.show',$student->student_id)}}"><i class="bi bi-info-square text-primary" style="font-size: 20px;"></i></a></td>
                                        </tr>
                                        @empty
                                        <tr class="text-center" style="color:red;"> <td colspan="6">لا يوجد نتائج لعرضها</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>