{{--@php--}}
{{--    $active=\App\Models\Subscribe::take(7)->orderBy('id','desc')->get();--}}
{{--@endphp--}}
{{--<div class="row">--}}
{{--    <div class="col-sm-12">--}}
{{--        <div class="card">--}}
{{--            <div class="card-body">--}}
{{--                <!-- title -->--}}
{{--                <div class="d-md-flex align-items-center">--}}
{{--                    <div>--}}
{{--                        <h4 class="card-title">اخر طلبات الخدمات الالكترونية</h4>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <!-- title -->--}}
{{--            </div>--}}
{{--            <div class="table-responsive">--}}
{{--                <table class="table v-middle">--}}
{{--                    <thead>--}}
{{--                    <tr class="bg-light">--}}
{{--                        <th class="border-top-0">الاسم</th>--}}
{{--                        <th class="border-top-0">البريد الالكتروني</th>--}}
{{--                        <th class="border-top-0">الهاتف</th>--}}
{{--                        <th class="border-top-0">الوظيفة</th>--}}
{{--                        <th class="border-top-0">رقم الهوية</th>--}}
{{--                        <th class="border-top-0">تاريخ الطلب</th>--}}
{{--                        <th class="border-top-0">نوع الطلب</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @foreach($active as $row)--}}
{{--                    <tr>--}}
{{--                        <td>--}}
{{--                            <div class="d-flex align-items-center">--}}
{{--                                <div class="m-r-10">--}}
{{--                                    <a class="btn btn-circle btn-{{$row->type == 1 ? 'success' : 'info'}} text-white">{{$row->id}}</a>--}}
{{--                                </div>--}}
{{--                                <div class="">--}}
{{--                                    <h4 class="m-b-0 font-16">{{$row->name }}</h4>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                        <td>{{$row->email}}</td>--}}
{{--                        <td>{{$row->phone}}</td>--}}

{{--                        <td>{{$row->job}}</td>--}}
{{--                        <td>{{$row->id_number}}</td>--}}
{{--                        <td>--}}
{{--                            <h5 class="m-b-0">{{$row->created_at}}</h5>--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            <label class="label label-{{$row->type == 1 ? 'success' : 'info'}} ">{{$row->type == 1 ? 'عامل' : 'منتسب'}}</label>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                        @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
