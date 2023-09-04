@include('main')
<style>
    .modal-confirm {
        color: #636363;
        width: 400px;
        margin: 30px auto;
    }

    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
        text-align: center;
        font-size: 14px;
    }

    .modal-confirm .modal-header {
        border-bottom: none;
        position: relative;
    }

    .modal-confirm h4 {
        text-align: center;
        font-size: 26px;
        margin: 30px 0 -10px;
    }

    .modal-confirm .close {
        position: absolute;
        top: -5px;
        right: -2px;
    }

    .modal-confirm .modal-body {
        color: #999;
    }

    .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
        padding: 10px 15px 25px;
    }

    .modal-confirm .modal-footer a {
        color: #999;
    }

    .modal-confirm .icon-box {
        width: 80px;
        height: 80px;
        margin: 0 auto;
        border-radius: 50%;
        z-index: 9;
        text-align: center;
        border: 3px solid #f15e5e;
    }

    .modal-confirm .icon-box i {
        color: #f15e5e;
        font-size: 46px;
        display: inline-block;
        margin-top: 13px;
    }

    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
        background: #60c7c1;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        min-width: 120px;
        border: none;
        min-height: 40px;
        border-radius: 3px;
        margin: 0 5px;
        outline: none !important;
    }

    .modal-confirm .btn-info {
        background: #c1c1c1;
    }

    .modal-confirm .btn-info:hover,
    .modal-confirm .btn-info:focus {
        background: #a8a8a8;
    }

    .modal-confirm .btn-danger {
        background: #f15e5e;
    }

    .modal-confirm .btn-danger:hover,
    .modal-confirm .btn-danger:focus {
        background: #ee3535;
    }

    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }

</style>
<div style="margin-top: 40px; margin-right: 270px;" dir="rtl">
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header pt-3 pb-1">
                    <h6 class="m-0 font-weight-bold text-primary" style="font-family: doridregular, Arial !important;font-size: 18px;"><strong>تفاصيل طالب</strong></h6>
                </div>
                <hr>
                <div class="card-body">
                    <div class="chart-area">
                    <center><img height="300px" width="320px" class="text-center" src="{{URL::asset('students/'.$student->picture)}}"></center> 

                        <div class="mb-3">
                            <label for="name" class="form-label">الاسم </label>
                            <input type="text" readonly name="name" id="name" class="form-control" value="{{isset($student)? $student->name :""}}">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">العنوان </label>
                            <input type="text" readonly name="address" id="address" class="form-control" value="{{isset($student)? $student->address :""}}">
                        </div>
                        <div class="mb-3">
                            <label for="birth_date" class="form-label">تاريخ الميلاد </label>
                            <input type="text" readonly name="birth_date" id="birth_date" class="form-control" value="{{isset($student)? $student->birth_date :""}}">
                        </div>      
                          <label for="course" class="col-md-2 text-right col-form-label">الصف<i class="text-danger"> * </i>:</label>
                            <div class="col-mb-3">
                                <div class="">
                                    <!-- <input type="text" class="form-control valid_number mb-2" name="category" id="category" placeholder="المستودع" value="" tabindex="4"> -->
                                    <select name="classes_id" disabled class="form-control select2" id="classes_id" tabindex="1">
                                        @foreach ($classeses as $classes)
                                        <!-- <option value="{{ $classes->classes_id }}">{{ $classes->name }}</option> -->
                                        <option readonly <?php if ($classes->classes_id == $student->classes_id) { ?> selected <?php } ?> value="{{ $classes->classes_id }}">{{ $classes->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                        <div class="row">
                            <div class="col-md-2" >
                                <form action="{{route('student.destroy',$student->student_id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    {{--  <!-- <button type="submit" class="btn btn-outline-danger " onclick="return confirm('Are you sure?')"></i>حذف</button> -->  --}}
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        حذف
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-confirm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="icon-box">
                                                        <i class="bi bi-x-lg" style="font-size: 2rem; color: #f15e5e;"></i>
                                                    </div>
                                                </div>
                                                <h4 class="modal-title">تأكيد عملية الحذف؟</h4>

                                                <div class="modal-body">
                                                  <p>هل تريد حذف الطالب المحدد بشكل نهائي.</p>
                                                 </div>
                                                <div class="modal-footer" style="margin-left:40px;">
                                                    <button type="submit" class="btn btn-danger">حذف</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <a href="{{route('student.index')}}" class="btn btn-outline-primary ">الرجوع للرئيسية</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->