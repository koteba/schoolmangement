@include('main')

<div style="margin-top: 40px; margin-right: 270px;"dir="rtl">
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-8 col-lg-7">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header pt-3 pb-1">
                        <h6 class="m-0 font-weight-bold text-primary" style="font-family: doridregular, Arial !important;font-size: 18px;"><strong>إضافة طالب</strong></h6>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="chart-area">
                            <form action="{{ route('student.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @method('POST')

                                <div class="mb-3">
                                    <label for="name" class="form-label">الاسم <i class="text-danger"> * </i>:</label>
                                    <input required type="text" name="name" id="name" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="birth_date" class="form-label">تاريخ الميلاد<i class="text-danger"> * </i>:</label>
                                    <input type="date" name="birth_date" id="birth_date" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">العنوان <i class="text-danger"> * </i>:</label>
                                    <input required type="text" name="address" id="address" class="form-control">
                                </div>
                                <div class="mb-3">
                                <label for="classes" class="form-label">الصف <i class="text-danger"> * </i>:</label>

                                <div class="">
                                    <!-- <input type="text" class="form-control valid_number mb-2" name="course" id="course" placeholder="المستودع" value="" tabindex="4"> -->
                                    <select required name="classes_id" class="form-control select2" id="classes_id" tabindex="1">
                                        @foreach ($classeses as $classes)
                                        <option value="{{ $classes->classes_id }}">{{ $classes->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                                <div class="mb-3">
                                    <label for="picture" class="form-label">الصورة <i class="text-danger"> * </i>:</label>
                                    <input required type="file" name="picture" id="picture" class="form-control @error('picture') is-invalid @enderror">
                                    @error('picture')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>يجب أن تكون الصورة من نوع  jpg ,png</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-outline-success" >حفظ</button>
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




