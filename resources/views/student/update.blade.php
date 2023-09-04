@include('main')

<div style="margin-top: 40px; margin-right: 270px;" dir="rtl">
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-8 col-lg-7">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header pt-3 pb-1">
                        <h6 class="m-0 font-weight-bold text-primary" style="font-family: doridregular, Arial !important;font-size: 18px;"><strong>تعديل طالب</strong></h6>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="chart-area">
                            <form action="{{ route('student.update',$student->student_id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @method('PUT')
                               <center><img height="300px" width="320px" class="text-center" src="{{URL::asset('students/'.$student->picture)}}"></center> 

                                <div class="mb-3">
                                    <label for="name" class="form-label">الاسم <i class="text-danger"> * </i>:</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{$student->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="birth_date" class="form-label">تاريخ الميلاد <i class="text-danger"> * </i>:</label>
                                    <input type="date"  id="birth_date" name="birth_date" class="form-control" value="{{ $student->birth_date }}">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">العنوان <i class="text-danger"> * </i>:</label>
                                    <input type="text" type="type" id="address" name="address" class="form-control" value="{{ $student->address }}">
                                </div>
                                <label for="name" class="col-md-2 text-right col-form-label">الصف<i class="text-danger"> * </i>:</label>
                            <div class="col-mb-3">
                                <div class="">
                                    <!-- <input type="text" class="form-control valid_number mb-2" name="category" id="category" placeholder="المستودع" value="" tabindex="4"> -->
                                    <select name="classes_id" class="form-control select2" id="classes_id" tabindex="1">
                                        @foreach ($classeses as $classes)
                                        <!-- <option value="{{ $classes->classes_id }}">{{ $classes->name }}</option> -->
                                        <option <?php if ($classes->classes_id == $student->classes_id) { ?> selected <?php } ?> value="{{ $classes->classes_id }}">{{ $classes->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                                <div class="mb-3">
                                    <label for="picture" class="form-label">الصورة <i class="text-danger"> * </i>:</label>
                                    <input type="file"  id="picture" name="picture" class="form-control   @error('picture') is-invalid @enderror" value="{{ $student->picture }}">
                                      
                                    @error('picture')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>يجب أن تكون الصورة من نوع  jpg ,png</strong>
                                        </span>
                                    @enderror
                                </div>

                            

                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-outline-success">تعديل</button>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('student.index')}}" class="btn btn-outline-primary ">الرجوع للرئيسية</a>
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