@extends('master')

@section('servicedetail')
    <div class="main">
        <section class="module">

            <div class="container">
                <span style="color:Green;font-size:20px">{{session()->get('addmsg')}}</span>
                <span style="color:Green;font-size:20px">{{session()->get('msg')}}</span>
                <div class="row">
                    {{--@foreach($pro as $val)--}}
                        {{--@php--}}
                        {{--$img=\DB::table('pimage')->where('p_id',$val->p_id)->first();--}}

                        {{--@endphp--}}
                    {{--@endforeach--}}
                    <div class="col-sm-6 mb-sm-40"><a class="gallery bimg" href="{{asset('assets')}}/images/shop/product-7.jpg"><img class="bimg" src="{{asset('assets')}}/images/shop/product-7.jpg" style="height: 400px" alt="Single Product Image"/></a>
                        <ul class="product-gallery">
                            {{--@foreach($pro as $val)--}}
                                {{--<li><a class="gallery simg" href="{{asset('assets')}}/productimage/product/{{$val->url}}"></a><img class="simg" src="{{asset('assets')}}/productimage/product/" alt="Single Product"/></li>--}}
                            {{--@endforeach--}}
                        </ul>
                    </div>
                    {{--@foreach($service as $val)--}}
                        @php
                            $sname=$service->sname;
                             $desc=$service->description;
                             $p=$service->price;
                        @endphp
                    {{--@endforeach--}}
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="product-title font-alt">{{$sname}}</h1>
                            </div>
                        </div>
                        <div class="row mb-20">
                            <div class="col-sm-12"><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star-off"></i></span><a class="open-tab section-scroll" href="#reviews">-2customer reviews</a>
                            </div>
                        </div>
                        <div class="row mb-20">
                            <div class="col-sm-12">
                                <div class="price font-alt"><span class="amount">{{$p}}</span></div>
                            </div>
                        </div>
                        <div class="row mb-20">
                            <div class="col-sm-12">
                                <div class="description">
                                    <p><b>{{$desc}}</b></p>
                                </div>
                            </div>
                        </div>
                        <form action="{{url('/addcart')}}/{{$service->service_id}}">
                            @csrf
                            <div class="row mb-20">
                                <div class="col-sm-4 mb-sm-20">
                                    <label>Service Provider Name:</label>
                                    <span style="font-size:20px;"><b>{{$prof->shopname}}</b></span>
                                    <input type="hidden" name="pf_u_id" value="{{$service->u_id}}">
                                    {{--<input class="form-control input-lg" type="number" name="qty" value="1" max="40" min="1" required="required"/>--}}
                                </div>
                                {{--<div class="col-sm-8"><a class="btn btn-lg btn-block btn-round btn-b" href="#">--}}
                                        {{--Add To Cart</a></div>--}}
                            </div>
                            <div class="col-sm-8">
                                <input class="btn btn-lg btn-block btn-round btn-b" type="submit" value="Add To Cart">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection