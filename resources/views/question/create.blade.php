@include('main')

<div style="margin-top: 40px; margin-right: 270px;"dir="rtl">
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-8 col-lg-7">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header pt-3 pb-1">
                        <h6 class="m-0 font-weight-bold text-primary" style="font-family: doridregular, Arial !important;font-size: 18px;"><strong>إضافة صف</strong></h6>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="chart-area">
                            <form action="{{ route('question.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @method('POST')

                                <div class="mb-3">
                                    <label for="question" class="form-label">السؤال <i class="text-danger"> * </i>:</label>
                                    <input required type="question" name="question" id="question" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="answer" class="form-label">الجواب <i class="text-danger"> * </i>:</label>
                                    <input required type="answer" name="answer" id="answer" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-outline-success" >حفظ</button>
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




