@extends('Admin.adminmaster')

@section('professional')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i>Professional Servicers Data </h3>
            <div class="row mb">
                <!-- page start-->
                <div class="content-panel">
                    <div class="adv-table">
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered responsive" id="hidden-table-info">
                            <thead class="responsive">
                            <tr>
                                <th>No</th>
                                <th>ServiceProvider_Name</th>
                                <th>Shop Name</th>
                                <th>GST</th>
                                <th>City</th>
                                {{--<th>User_Id</th>--}}
                                <th>Approval</th>
                                <th>Action</th>
                                {{--<th class="hidden-phone">Platform(s)</th>--}}
                                {{--<th class="hidden-phone">Engine version</th>--}}
                                {{--<th class="hidden-phone">CSS grade</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1; @endphp
                            @foreach($userprof as $val)
                                <tr class="gradeX">
                                    <td>{{$i++}}</td>
                                    <td>{{$val->Name}}</td>
                                    <td>{{$val->shopname}}</td>
                                    <td>{{$val->gst}}</td>
                                    <td>{{$val->city}}</td>
                                    {{--<td>{{$val->u_id}}</td>--}}
                                    <td>
                                        {{($val->Approve==1) ? 'Approve' :'NOt'}}
                                        {{--{{$val->Approve}}--}}
                                    </td>
                                    {{--<td class="hidden-phone">Win 95+</td>--}}
                                    {{--<td class="center hidden-phone">4</td>--}}
                                    {{--<td class="center hidden-phone">X</td>--}}
                                    <td>
                                        @if($val->Approve==1)
                                            <a href="/Admin/disapprove/{{$val->u_id}}"><button class="btn btn-danger btn-xs"><i class="fa fa-close">Dis Approved</i></button></a>
                                        @else
                                            <a href="/Admin/approve/{{$val->u_id}}"><button class="btn btn-success btn-xs"><i class="fa fa-check">Approve</i></button></a>

                                        @endif
                                        {{--<a href="/Admin/updatesubcategory/{{$val->sc_id}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>--}}
                                        <a href="/Admin/deleteprof/{{$val->u_id}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection


