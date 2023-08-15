@extends('Admin.adminmaster')

@section('updatecoupon')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-gears">&nbsp;&nbsp;&nbsp;</i>Update Coupon Details</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        {{--<h4 class="mb"><i class="fa fa-angle-right"></i> Inline Form</h4>--}}
                        <span style="color:red;">{{session()->get('msg')}}</span>
                        <form class="form-inline" action="{{url('Admin/updating')}}/{{$val->coupon_id}}" method="post" role="form">
                            @csrf
                            <div class="form-group">
                                {{--@foreach($updcoupon as $val)--}}
                                <div>
                                    <lable><b>Coupon Code</b></lable><br>
                                    <input type="text" name="ccode" id="ccode" class="form-control" placeholder="Coupon Code" value="{{$val->coupon_code}}">
                                    <button type="button" id="valid" class="btn btn-theme" name="valid">Valid</button><br>
                                </div>
                                <div id="validmsg"></div><br>
                                <div>
                                    <lable><b>User</b></lable><br>
                                    <select class="form-control" name="u_id">
                                        <option selected value="0">All</option>
                                        @php
                                            $user=DB::table('user')->get();
                                        @endphp
                                        @foreach($user as $v)
                                            @if($v->u_id==$val->u_id)
                                                <option value="{{$val->u_id}}" selected>{{$v->cust_name}}</option>
                                            @else
                                                <option value="{{$val->u_id}}">{{$v->cust_name}}</option>
                                            @endif
                                        @endforeach
                                    </select><br>
                                </div><br>
                                <div class="form-group" style="margin: 10px 0;">
                                    <lable style="margin: 15px 0;"><b>Coupon Type</b></lable><br>
                                    @php $type=$val->coupon_type; @endphp
                                    @if($type==1)
                                        <input type="radio" name="ctype" class="form-control radio" placeholder="Coupon Code" value="1" style=" height: auto; " checked><lable><span style="padding:0 10px; margin: auto 0;">Percentage</span></lable>
                                        <input type="radio" name="ctype" class="form-control radio" placeholder="Coupon Code" value="0" style=" height: auto; "><lable><span style="padding:0 10px; margin: auto 0;">Flat</span></lable>
                                    @else
                                        <input type="radio" name="ctype" class="form-control radio" placeholder="Coupon Code" value="1" style=" height: auto; "><lable><span style="padding:0 10px; margin: auto 0;" >Percentage</span></lable>
                                        <input type="radio" name="ctype" class="form-control radio" placeholder="Coupon Code" value="0" style=" height: auto; " checked><lable><span style="padding:0 10px; margin: auto 0;" >Flat</span></lable>
                                    @endif
                                </div><br>
                                <div>
                                    <lable><b>Discount Amount</b></lable><br>
                                    <input type="number" name="damount" class="form-control" placeholder="Discount Amount" value="{{$val->discount_amt}}">
                                </div><br>
                                <div>
                                    <lable><b>Minimum Amount</b></lable><br>
                                    <input type="number" name="minamount" class="form-control" placeholder="Minimum Amount" value="{{$val->minimum_amt}}">
                                </div><br>
                                <div>
                                    <lable><b>Number of Use</b></lable><br>
                                    <input type="number" name="noofuse" class="form-control" placeholder="Number of Use" value="{{$val->no_use}}">
                                </div><br>
                                <div>
                                    <lable><b>Starting Date</b></lable><br>
                                    <input type="date" name="sdate" class="form-control" placeholder="Starting Date" value="{{$val->start_date}}">
                                </div><br>
                                <div>
                                    <lable><b>Ending Date</b></lable><br>
                                    <input type="date" name="edate" class="form-control" placeholder="Ending Date" value="{{$val->end_date}}">
                                </div><br>
                                {{--@endforeach--}}
                            </div></br></br>
                            <button type="submit" class="btn btn-theme">Update Coupon</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>

@endsection