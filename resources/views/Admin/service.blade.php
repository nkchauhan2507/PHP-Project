@extends('Admin.adminmaster')

@section('service')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-gears">&nbsp;&nbsp;&nbsp;</i>Add Service Details</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        {{--<h4 class="mb"><i class="fa fa-angle-right"></i> Inline Form</h4>--}}
                        <form class="form-inline" action="{{url('Admin/addservice')}}" method="post" role="form">
                            @csrf
                            <div class="form-group">
                                {{--&nbsp;<label style="color:black;">Sub_Service Details</label></br>--}}
                                <input type="text" name="sname" class="form-control" placeholder="Service Name"><br><br>
                                <select class="form-control" name="sc_id">
                                    <option>--Select--</option>
                                    @foreach($sub as $val)
                                        <option value="{{$val->sc_id}}">{{$val->scname}}</option>
                                    @endforeach
                                </select><br><br>
                                <textarea class="form-control" name="desc" placeholder="Description of Service"></textarea><br><br>
                                <input type="text" name="price" class="form-control" placeholder="Price"><br><br>
                            </div></br></br>
                            <button type="submit" class="btn btn-theme">Add</button>
                        </form>
                    </div>
                </div>
            </div>


            {{--Service Data-Table Content --}}
            <span style="color:green;">{{session()->get('updmsg')}}</span>
            <h3><i class="fa fa-angle-right"></i> Service Table Data </h3>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered responsive" id="restbl">
                        <thead class="responsive">
                        <tr>
                            <th class="all">No</th>
                            <th class="all">Service-Name</th>
                            <th class="none">Description</th>
                            <th class="all">Price</th>
                            <th class="all">Subcategory_id</th>
                            <th class="none">User_id</th>
                            <th class="all">Action</th>

                            {{--<th class="hidden-phone">Engine version</th>--}}
                            {{--<th class="hidden-phone">CSS grade</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1; @endphp
                        @foreach($ser as $val)
                            <tr class="gradeX">
                                <td>{{$i++}}</td>
                                <td>{{$val->sname}}</td>
                                <td>{{$val->description}}</td>
                                <td>{{$val->price}}</td>
                                <td>{{$val->sc_id}}</td>
                                <td>{{$val->u_id}}</td>
                                {{--<td class="center hidden-phone">4</td>--}}
                                {{--<td class="center hidden-phone">X</td>--}}
                                <td>
                                    {{--<a><button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button></a>--}}
                                    <a href="/Admin/updateservice/{{$val->service_id}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                    <a href="/Admin/deleteservice/{{$val->service_id}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
@endsection

@section('script')

            <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#restbl').DataTable();
                } );
            </script>
@endsection