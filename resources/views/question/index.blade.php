@include('main')
<div class="container" style="margin-top: 40px;" dir="rtl">
            <div class="row ">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row pb-1">
                                <div class="col-md-4">
                                <h6 class="m-2 font-weight-bold text-primary" style="font-family: doridregular, Arial !important;font-size: 20px;"><strong>بيانات الصفوف</strong></h6>
                                </div>
                                <div class="col-md-8">
                                <a href="{{route('question.create')}}" class="btn btn-outline-success ms-2" style="float:left;">أضافة <i class="bi bi-plus-circle-dotted" style="font-size: 20px;"></i></a>
                                <a href="{{route('question.index')}}" class="btn btn-outline-info ms-2" style="float:left;">تحديث<i class="bi bi-arrow-clockwise" style="font-size: 20px;"></i></a>

                                </div>
                            </div>
                            <hr>
                            <div class="row" style="margin-top:14px;">
                                <div class="col-md-6">
                                    <form action="{{ route('question.index') }}" method="GET">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" name="search_question" value="" required class="form-control rounded"
                                                placeholder=" بحث حسب الاسم" />
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
                                            <th style="text-align:center" scope="col">السؤال </th>
                                            <th style="text-align:center" scope="col">الجواب </th>
                                             <th style="text-align:center" scope="col">تعديل</th>
                                            <th style="text-align:center" scope="col">تفاصيل </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($questions as $question)
                                        <tr>
                                            <td style="text-align:center">{{$question->question_id}}</td>
                                            <td style="text-align:center">{{$question->question}}</td>
                                            <td style="text-align:center">{{$question->answer}}</td>

                                                <td style="text-align:center"><a href="{{route('question.edit',$question->question_id)}}"><i class="bi bi-pencil-square text-success" style="font-size: 20px;"></i></a></td>
                                                <td style="text-align:center"><a href="{{route('question.show',$question->question_id)}}"><i class="bi bi-info-square text-primary" style="font-size: 20px;"></i></a></td>
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