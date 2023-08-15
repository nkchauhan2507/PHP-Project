@extends('Admin.adminmaster')

@section('subcategory')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-gears">&nbsp;&nbsp;&nbsp;</i>Add Sub_Category Details</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        {{--<h4 class="mb"><i class="fa fa-angle-right"></i> Inline Form</h4>--}}
                        <form class="form-inline" action="{{url('Admin/addsubcategory')}}" method="post" role="form">
                            @csrf
                            <div class="form-group">
                                {{--&nbsp;<label style="color:black;">Sub_Service Details</label></br>--}}
                                <input type="text" name="scname" class="form-control" placeholder="Subcategory Name"><br><br>
                                <select class="form-control" name="c_id">
                                    <option>--Select--</option>
                                    @foreach($cat as $val)
                                        <option value="{{$val->category_id}}">{{$val->cname}}</option>
                                    @endforeach
                                </select><br><br>
                                {{--<textarea class="form-control">Description of Service</textarea><br><br>--}}
                                {{--<input type="file" name="img" class="form-control"s><br><br>--}}
                            </div></br></br>
                            <button type="submit" class="btn btn-theme">Add</button>
                        </form>
                    </div>
                </div>
            </div>
            <span style="color:green">{{session()->get('msg')}}</span>
            <span style="color:Red">{{session()->get('msgdlt')}}</span>
            {{--Data Table Content--}}

            <h3><i class="fa fa-angle-right"></i> Sub_category Table Data </h3>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered responsive" id="restbl">
                        <thead class="responsive">
                        <tr>
                            <th>No</th>
                            <th>Subcategory-Name</th>
                            <th>Category_id</th>
                            <th>Action</th>
                            {{--<th class="hidden-phone">Platform(s)</th>--}}
                            {{--<th class="hidden-phone">Engine version</th>--}}
                            {{--<th class="hidden-phone">CSS grade</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1; @endphp
                        @foreach($subcat as $val)
                            <tr class="gradeX">
                                <td>{{$i++}}</td>
                                <td>{{$val->scname}}</td>
                                <td>{{$val->category_id}}</td>
                                {{--<td class="hidden-phone">Win 95+</td>--}}
                                {{--<td class="center hidden-phone">4</td>--}}
                                {{--<td class="center hidden-phone">X</td>--}}
                                <td>
                                    {{--<a><button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button></a>--}}
                                    <a href="/Admin/updatesubcategory/{{$val->sc_id}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                    <a href="/Admin/deletesubcategory/{{$val->sc_id}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
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