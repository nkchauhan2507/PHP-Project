@extends('Admin.adminmaster')

@section('coupon')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-gears">&nbsp;&nbsp;&nbsp;</i>Add Coupon Details</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        {{--<h4 class="mb"><i class="fa fa-angle-right"></i> Inline Form</h4>--}}
                        <span style="color:red;">{{session()->get('msg')}}</span>
                        <form class="form-inline" action="{{url('Admin/addcoupon')}}" method="post" role="form">
                            @csrf
                            <div class="form-group">
                                <div>
                                    <lable><b>Coupon Code</b></lable><br>
                                    <input type="text" name="ccode" id="ccode" class="form-control" placeholder="Coupon Code">
                                    <button type="button" id="valid" class="btn btn-theme" name="valid">Valid</button><br>
                                </div>
                                <div id="validmsg"></div><br>
                                <div>
                                    <lable><b>User</b></lable><br>
                                    <select class="form-control" name="u_id">
                                        <option selected value="0">All</option>
                                        @foreach($user as $val)
                                            <option value="{{$val->u_id}}">{{$val->cust_name}}</option>
                                        @endforeach
                                    </select><br>
                                </div><br>
                                <div class="form-group" style="margin: 10px 0;">
                                    <lable style="margin: 15px 0;"><b>Coupon Type</b></lable><br>
                                    <input type="radio" name="ctype" class="form-control radio" placeholder="Coupon Code" value="1" style=" height: auto; "><lable><span style="padding:0 10px; margin: auto 0;">Percentage</span></lable>
                                    <input type="radio" name="ctype" class="form-control radio" placeholder="Coupon Code" value="0" style=" height: auto; "><lable><span style="padding:0 10px; margin: auto 0;">Flat</span></lable>
                                </div><br>
                                <div>
                                    <lable><b>Discount Amount</b></lable><br>
                                    <input type="number" name="damount" class="form-control" placeholder="Discount Amount">
                                </div><br>
                                <div>
                                    <lable><b>Minimum Amount</b></lable><br>
                                    <input type="number" name="minamount" class="form-control" placeholder="Minimum Amount">
                                </div><br>
                                <div>
                                    <lable><b>Number of Use</b></lable><br>
                                    <input type="number" name="noofuse" class="form-control" placeholder="Number of Use">
                                </div><br>
                                <div>
                                    <lable><b>Starting Date</b></lable><br>
                                    <input type="date" name="sdate" class="form-control" placeholder="Starting Date">
                                </div><br>
                                <div>
                                    <lable><b>Ending Date</b></lable><br>
                                    <input type="date" name="edate" class="form-control" placeholder="Ending Date">
                                </div><br>
                            </div></br></br>
                            <button type="submit" class="btn btn-theme">Add Coupon</button>
                        </form>
                    </div>
                </div>
            </div>

            {{--Coupon Data Table--}}

            <h3><i class="fa fa-angle-right"></i> Coupon Table Data </h3>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered responsive" id="hidden-table-info">
                        <thead class="responsive">
                        <tr>
                            <th>No</th>
                            <th>Coupon_Code</th>
                            <th>Discount_Amount</th>
                            <th>minimum_Amount</th>
                            <th>No_of_Use</th>
                            <th>Coupon_Type</th>
                            <th>Starting_Date</th>
                            <th>Ending_Date</th>
                            <th>User_id</th>
                            <th>Action</th>

                            {{--<th class="hidden-phone">Engine version</th>--}}
                            {{--<th class="hidden-phone">CSS grade</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1; @endphp
                        @foreach($coupon as $val)
                            <tr class="gradeX">
                                <td class="all">{{$i++}}</td>
                                <td class="all">{{$val->coupon_code}}</td>
                                <td class="all">{{$val->discount_amt}}</td>
                                <td class="all">{{$val->minimum_amt}}</td>
                                <td class="all">{{$val->no_use}}</td>
                                <td class="all">{{$val->coupon_type}}</td>
                                <td class="all">{{$val->start_date}}</td>
                                <td class="all">{{$val->end_date}}</td>
                                <td class="all">{{$val->u_id}}</td>
                                {{--<td class="center hidden-phone">4</td>--}}
                                {{--<td class="center hidden-phone">X</td>--}}
                                <td>
                                    {{--<a><button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button></a>--}}
                                    <a href="/Admin/updatecoupon/{{$val->coupon_id}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                    <a href="/Admin/deletecoupon/{{$val->coupon_id}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
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

    <script>
        $('#valid').click(function(){
            var code=$('#ccode').val();
            $.ajax({
               url:"{{url('/Admin/couponcode')}}/" + code,
                success:function(result){
                    if(result==0)
                    {
                        $('#validmsg').html('<span style="color:green;">You Can Add this Code</span>');
                    }
                    else
                    {
                        $('#validmsg').html("<span style='color:red;'>You Can't Add this Code</span>");
                    }
                }
            });
        });
    </script>
@endsection