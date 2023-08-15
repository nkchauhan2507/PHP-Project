@extends('professional.profadmin')

@section('updateprof')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-gears">&nbsp;&nbsp;&nbsp;</i>Update Service</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        {{--<h4 class="mb"><i class="fa fa-angle-right"></i> Inline Form</h4>--}}
                        <form class="form-inline" action="{{url('professional/updservice')}}/{{$prof->pf_id}}" method="post" role="form">
                            @csrf
                            <div class="form-group">
                                {{--<select class="form-control" name="cname">--}}
                                    {{--<option>--Select--</option>--}}
                                    {{--@foreach($cat as $val)--}}
                                        {{--@php--}}
                                            {{--$pf=\DB::table('professional')->where('pf_id',$prof->pf_id)->first();--}}
                                        {{--@endphp--}}
{{--                                        @if($val->shopname==$pf->shopname)--}}
                                            {{--<option value="{{$val->shopname}}" selected>{{$val->shopname}}</option>--}}
                                            <input class="form-control" type="text" value="{{$prof->shopname}}" name="shopname">
                                        {{--@endif--}}
                                    {{--@endforeach--}}
                                {{--</select><br><br>--}}
                            </div></br></br>
                            <button type="submit" class="btn btn-theme">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>

@endsection