@include('main')
<div class="container" style="margin-top: 40px;" dir="rtl">
            <div class="row ">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row pb-1">
                                <div class="col-md-4">
                                <h6 class="m-2 font-weight-bold text-primary" style="font-family: doridregular, Arial !important;font-size: 20px;"><strong>بيانات المواد</strong></h6>
                                </div>
                                <div class="col-md-8">
                                <a href="{{route('course.create')}}" class="btn btn-outline-success ms-2" style="float:left;">أضافة <i class="bi bi-plus-circle-dotted" style="font-size: 20px;"></i></a>
                                <a href="{{route('course.index')}}" class="btn btn-outline-info ms-2" style="float:left;">تحديث<i class="bi bi-arrow-clockwise" style="font-size: 20px;"></i></a>

                                </div>
                            </div>
                            <hr>
                            <div class="row" style="margin-top:14px;">
                                <div class="col-md-6">
                                    <form action="{{ route('course.index') }}" method="GET">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" name="search_courae" value="" required class="form-control rounded"
                                                placeholder=" بحث حسب المقرر او المدرس" />
                                            <button type="submit" class="btn btn-primary rtl">بحث</button>
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
                                            <th style="text-align:center" scope="col">المادة </th>
                                            <th style="text-align:center" scope="col">المدرس</th>
                                             <th style="text-align:center" scope="col">تعديل</th>
                                            <th style="text-align:center" scope="col">تفاصيل </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($courses as $course)
                                        <tr>
                                            <td style="text-align:center">{{$course->course_id}}</td>
                                            <td style="text-align:center">{{$course->course}}</td>
                                            <td style="text-align:center">{{$course->teacher}}</td>


                                                <td style="text-align:center"><a href="{{route('course.edit',$course->course_id)}}"><i class="bi bi-pencil-square text-success" style="font-size: 20px;"></i></a></td>
                                                <td style="text-align:center"><a href="{{route('course.show',$course->course_id)}}"><i class="bi bi-info-square text-primary" style="font-size: 20px;"></i></a></td>
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