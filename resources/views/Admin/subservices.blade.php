@extends('Admin.adminmaster')

@section('subservices')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-gears">&nbsp;&nbsp;&nbsp;</i>Add Sub_service Details</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        {{--<h4 class="mb"><i class="fa fa-angle-right"></i> Inline Form</h4>--}}
                        <form class="form-inline" action="{{url('Admin/addservices')}}" method="post" role="form">
                            @csrf
                            <div class="form-group">
                                {{--&nbsp;<label style="color:black;">Sub_Service Details</label></br>--}}
                                <input type="text" name="subname" class="form-control" placeholder="SubService Name"><br><br>
                                <select class="form-control" name="serviceid">
                                    <option>--Select--</option>
                                @foreach($service as $val)
                                    <option value="{{$val->service_id}}">{{$val->servicename}}</option>
                                @endforeach
                                </select><br><br>
                                <textarea class="form-control">Description of Service</textarea><br><br>
                                <input type="file" name="img" class="form-control"s><br><br>
                            </div></br></br>
                            <button type="submit" class="btn btn-theme">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection