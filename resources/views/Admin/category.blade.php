@extends('Admin.adminmaster')

@section('category')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-gears">&nbsp;&nbsp;&nbsp;</i>Add Category</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        {{--<h4 class="mb"><i class="fa fa-angle-right"></i> Inline Form</h4>--}}
                        <form class="form-inline" action="{{url('Admin/addcategory')}}" method="post" role="form">
                            @csrf
                            <div class="form-group">
                                {{--<label class="sr-only" for="exampleInputEmail2">Email address</label>--}}
                                &nbsp;<label style="color:black;">Category Name</label></br>
                                <input type="text" name="cname" class="form-control" placeholder="Enter Categpry Name">
                                {{--<p> {{session()->get('msg')}}</p>--}}
                            </div></br></br>
                            <div id="msg"></div>
                            <button id="add" type="submit" class="btn btn-theme">Add</button>
                        </form>
                    </div>
                </div>
            </div>
            <span style="color:green;">{{session()->get('msg')}}</span>
            <span style="color:Red;">{{session()->get('msgdlt')}}</span>
            {{--<div class="col-lg-12">--}}
                {{--<span style="color:red;"> {{session()->get('message')}}</span>--}}
                {{--<span style="color:Green;"> {{session()->get('msg')}}</span>--}}
                {{--<div class="content-panel">--}}
                    {{--<table class="table table-striped table-advance table-hover responsive">--}}
                        {{--<h4><i class="fa fa-angle-right"></i> Category Table</h4>--}}
                        {{--<hr>--}}
                        {{--<thead class="responsive">--}}
                        {{--<tr>--}}
                            {{--<th class="all">No</th>--}}
                            {{--<th class="all">CategoryName</th>--}}
                            {{--<th class="all">Action</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--@php $i=1; @endphp--}}
                        {{--@foreach($cat as $val)--}}
                            {{--<tr>--}}
                                {{--<td>{{$i++}}</td>--}}
                                {{--<td>{{$val->cname}}</td>--}}
                                {{--<td>--}}
                                {{--<a href="basic_table.html#">Company Ltd</a>--}}
                                {{--</td>--}}
                                {{--<td class="hidden-phone">Lorem Ipsum dolor</td>--}}
                                {{--<td>12000.00$ </td>--}}
                                {{--<td><span class="label label-info label-mini">Due</span></td>--}}
                                {{--<td>--}}
                                    {{--<a><button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button></a>--}}
                                    {{--<a href="#"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>--}}
                                    {{--<a href="#"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                {{--</div>--}}
                {{--<!-- /content-panel -->--}}
            {{--</div>--}}
            {{--<div class="row mb">--}}
                <!-- page start-->
            <h3><i class="fa fa-angle-right"></i> Category Table Data </h3>
                <div class="content-panel">
                    <div class="adv-table">
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered responsive" id="mbe1">
                            <thead>
                            <tr>
                                <th class="all">No</th>
                                <th class="all">Category-Name</th>
                                <th class="all">Action</th>
                                {{--<th class="hidden-phone">Platform(s)</th>--}}
                                {{--<th class="hidden-phone">Engine version</th>--}}
                                {{--<th class="hidden-phone">CSS grade</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1; @endphp
                            @foreach($cat as $val)
                                <tr class="gradeX">
                                    <td>{{$i++}}</td>
                                    <td>{{$val->cname}}</td>
                                    {{--<td class="hidden-phone">Win 95+</td>--}}
                                    {{--<td class="center hidden-phone">4</td>--}}
                                    {{--<td class="center hidden-phone">X</td>--}}
                                    <td>
                                        {{--<a><button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button></a>--}}
                                        <a href="/Admin/updatecategory/{{$val->category_id}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        <a href="/Admin/deletecategory/{{$val->category_id}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            {{--</div>--}}
        </section>
    </section>
    {{--<script>--}}
        {{--$(document).ready(function() {--}}
            {{--alert('hello');--}}
        {{--});--}}
    {{--</script>--}}
@endsection
@section('script2')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#mbe1').DataTable();
        } );
//        $('#add').click(function(){
//          $('#msg').html('<p>&#9989 Category added Successfully</p>');
//            swal("Good job!", "You clicked the button!", "success");
//            swal("Good job!","You clicked the button!","success");
//        });
    </script>
@endsection