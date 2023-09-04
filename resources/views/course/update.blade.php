@include('main')

<div style="margin-top: 40px; margin-right: 270px;" dir="rtl">
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-8 col-lg-7">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header pt-3 pb-1">
                        <h6 class="m-0 font-weight-bold text-primary" style="font-family: doridregular, Arial !important;font-size: 18px;"><strong>تعديل مادة</strong></h6>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="chart-area">
                            <form action="{{ route('course.update',$course->course_id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">المادة <i class="text-danger"> * </i>:</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{$course->name }}">
                                </div>
                                <label for="name" class="col-md-2 text-right col-form-label">المدرس<i class="text-danger"> * </i>:</label>
                            <div class="col-mb-3">
                                <div class="">
                                    <!-- <input type="text" class="form-control valid_number mb-2" name="category" id="category" placeholder="المستودع" value="" tabindex="4"> -->
                                    <select name="teacher_id" class="form-control select2" id="teacher_id" tabindex="1">
                                        @foreach ($teachers as $teacher)
                                        <!-- <option value="{{ $teacher->teacher_id }}">{{ $teacher->name }}</option> -->
                                        <option <?php if ($teacher->teacher_id == $course->teacher_id) { ?> selected <?php } ?> value="{{ $teacher->teacher_id }}">{{ $teacher->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                         
<br>


                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-outline-success">تعديل</button>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('course.index')}}" class="btn btn-outline-primary ">الرجوع للرئيسية</a>
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