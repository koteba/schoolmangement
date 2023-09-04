@include('main')

<div style="margin-top: 40px; margin-right: 270px;" dir="rtl">
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-8 col-lg-7">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header pt-3 pb-1">
                        <h6 class="m-0 font-weight-bold text-primary" style="font-family: doridregular, Arial !important;font-size: 18px;"><strong>تعديل مدرس</strong></h6>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="chart-area">
                            <form action="{{ route('mark.update',$mark->mark_id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @method('PUT')
                                <label for="name" class="col-md-2 text-right col-form-label">الطالب<i class="text-danger"> * </i>:</label>
                            <div class="col-mb-3">
                                <div class="">
                                    <!-- <input type="text" class="form-control valid_number mb-2" name="category" id="category" placeholder="المستودع" value="" tabindex="4"> -->
                                    <select name="student_id" class="form-control select2" id="student_id" tabindex="1">
                                        @foreach ($students as $student)
                                        <!-- <option value="{{ $student->student_id }}">{{ $student->name }}</option> -->
                                        <option <?php if ($student->student_id == $mark->student_id) { ?> selected <?php } ?> value="{{ $student->student_id }}">{{ $student->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label for="course" class="col-md-2 text-right col-form-label">المقرر<i class="text-danger"> * </i>:</label>
                            <div class="col-mb-3">
                                <div class="">
                                    <!-- <input type="text" class="form-control valid_number mb-2" name="category" id="category" placeholder="المستودع" value="" tabindex="4"> -->
                                    <select name="course_id" class="form-control select2" id="course_id" tabindex="1">
                                        @foreach ($courses as $course)
                                        <!-- <option value="{{ $course->course_id }}">{{ $course->name }}</option> -->
                                        <option <?php if ($course->course_id == $mark->course_id) { ?> selected <?php } ?> value="{{ $course->course_id }}">{{ $course->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                              
                                <div class="mb-3">
                                    <label for="mark" class="form-label">العلامة <i class="text-danger"> * </i>:</label>
                                    <input type="number" min="0" max="100" id="mark" name="mark" class="form-control" value="{{ $mark->mark }}">
                                </div>
                         



                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-outline-success">تعديل</button>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('mark.index')}}" class="btn btn-outline-primary ">الرجوع للرئيسية</a>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>