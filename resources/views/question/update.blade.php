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
                            <form action="{{ route('question.update',$question->question_id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">الصف <i class="text-danger"> * </i>:</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{$question->name }}">
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-outline-success">تعديل</button>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('question.index')}}" class="btn btn-outline-primary ">الرجوع للرئيسية</a>
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