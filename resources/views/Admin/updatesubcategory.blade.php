@extends('Admin.adminmaster')

@section('updatesubcategory')

    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-gears">&nbsp;&nbsp;&nbsp;</i>Update Sub_Category Details</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        {{--<h4 class="mb"><i class="fa fa-angle-right"></i> Inline Form</h4>--}}
                        <form class="form-inline" action="{{url('Admin/updatedsubcategory')}}/{{$subcate->sc_id}}" method="post" role="form">
                            @csrf
                            <div class="form-group">
                                {{--&nbsp;<label style="color:black;">Sub_Service Details</label></br>--}}
                                <input type="text" name="scname" class="form-control" placeholder="Subcategory Name" value="{{$subcate->scname}}"><br><br>
                                {{--<select class="form-control" name="sc_id">--}}
                                    {{--<option>--Select--</option>--}}
                                    {{--@foreach($updsubc as $val)--}}
                                        {{--@if($val->sc_id==$cat->sc_id)--}}
                                            {{--<option value="{{$val->category_id}}" selected>{{$val->cname}}</option>--}}
                                        {{--@else--}}
                                            {{--<option value="{{$val->category_id}}">{{$val->cname}}</option>--}}
                                        {{--@endif--}}
                                    {{--@endforeach--}}
                                {{--</select><br><br>--}}
                                {{--<textarea class="form-control">Description of Service</textarea><br><br>--}}
                                {{--<input type="file" name="img" class="form-control"s><br><br>--}}
                            </div></br></br>
                            <button type="submit" class="btn btn-theme">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>

@endsection
