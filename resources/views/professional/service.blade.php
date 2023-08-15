@extends('professional.profadmin')

@section('service')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-gears">&nbsp;&nbsp;&nbsp;</i>Add Service Details</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        {{--<h4 class="mb"><i class="fa fa-angle-right"></i> Inline Form</h4>--}}
                        <form class="form-inline" action="{{url('professional/addservice')}}" method="post" role="form">
                            @csrf
                            <div class="form-group">
                            <select class="form-control" id="cat" name="cid">
                                <option>--Select Category--</option>
                                @foreach($cat as $val)
                                    <option value="{{$val->category_id}}">{{$val->cname}}</option>
                                @endforeach
                            </select><br><br>
                            <select class="form-control" id="sc_id" name="sc_id">
                                <option>--Select Sub_category--</option>
                            </select></br></br>

                            <input style="width:200px;" class="form-control" type="text" name="sname" id="sname" placeholder="Enter Service Name"><br><br>
                            <textarea class="form-control" name="desc" placeholder="Enter Description"></textarea><br><br>
                            <input style="width:200px;" class="form-control" type="text" name="price" placeholder="Enter Service Price">
                            </div></br></br>
                            <button type="submit" class="btn btn-theme">Add</button>
                        </form>
                    </div>
                </div>
            </div>


            {{--Service Data Table--}}

            <h3><i class="fa fa-angle-right"></i> Service Provided By Us</h3>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered responsive" id="restbl">
                        <thead class="responsive">
                        <tr>
                            <th class="all">No</th>
                            <th class="all">Service</th>
                            <th class="none">Description</th>
                            <th class="all">Price</th>
                            <th class="none">Sub_category_id</th>
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
                                {{--<td class="center hidden-phone">4</td>--}}
                                {{--<td class="center hidden-phone">X</td>--}}
                                <td>
                                    {{--<a><button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button></a>--}}
                                    <a href="/professional/updatepservice/{{$val->u_id}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                    <a href="/professional/deleteservice/{{$val->u_id}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>
@endsection
@section('script')
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#restbl').DataTable();
        } );

        $('#cat').change(function(){
            var c=$(this).val();
//            alert(c);
            $.ajax({
                url:"{{url('professional/category')}}/"+c,
                success:function(result){
//                    console.log(result);
                    $('#sc_id').html(result);
                }
            });
        });
    </script>
@endsection