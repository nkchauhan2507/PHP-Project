@extends('Admin.adminmaster')

@section('service')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-gears">&nbsp;&nbsp;&nbsp;</i>Add Service Details</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        {{--<h4 class="mb"><i class="fa fa-angle-right"></i> Inline Form</h4>--}}
                        <form class="form-inline" action="{{url('Admin/updatedservice')}}/{{$service->service_id}}" method="post" role="form">
                            @csrf
                            <div class="form-group">
                                {{--&nbsp;<label style="color:black;">Sub_Service Details</label></br>--}}
                                <input type="text" name="sname" class="form-control" placeholder="Service Name" value="{{$service->sname}}"><br><br>
                                {{--<select class="form-control" name="sc_id">--}}
                                    {{--<option>--Select--</option>--}}
                                    {{--@foreach($sub as $val)--}}
                                        {{--@if($sub->sc_id==$service->sc_id)--}}
                                            {{--<option value="{{$val->sc_id}}" selected>{{$val->scname}}</option>--}}
                                        {{--@else--}}
                                            {{--<option value="{{$val->sc_id}}">{{$val->scname}}</option>--}}
                                        {{--@endif--}}
                                    {{--@endforeach--}}
                                {{--</select><br><br>--}}
                                <textarea class="form-control" name="desc" value="{{$service->description}}" placeholder="Description of Service" ></textarea><br><br>
                                <input type="text" name="price" class="form-control" value="{{$service->price}}" placeholder="Price" ><br><br>
                            </div></br></br>
                            <button type="submit" class="btn btn-theme">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection