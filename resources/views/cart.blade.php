@extends('master')

@section('cart')
    <div class="main">
        <section class="module">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h1 class="module-title font-alt">Cart</h1>
                    </div>
                </div>
                <span class="err" style="color:Green;"><b></b></span>
                <hr class="divider-w pt-20">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-striped table-border checkout-table">
                            <tbody>
                            <tr>
                                <th class="hidden-xs">Item</th>
                                <th>Description</th>
                                <th class="hidden-xs">Price</th>
                                {{--<th>Quantity</th>--}}
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                            @php $total=0; @endphp
                            @if(isset($cart) && count($cart)>0)
                                @foreach($cart as $key=>$val)
                                    @php $total=$total+$val['price'] ; @endphp
                                    <tr>
                                        <td class="hidden-xs"><a href="#"><img src="{{asset('assets')}}/images/shop/product-14.jpg" alt="Accessories Pack"/></a></td>
                                        <td>
                                            <h5 class="product-title font-alt">{{$val['sname']}}</h5>
                                        </td>
                                        <td class="hidden-xs">
                                            <h5 class="product-title font-alt">{{$val['price']}}</h5>
                                        </td>
                                        {{--<td>--}}
                                            {{--<input class="form-control" id="qty" type="number" name="qty" value="{{$val['qty']}}" max="50" min="1"/>--}}
                                        {{--</td>--}}
                                        {{--</td>--}}
                                        <td>
                                            <h5 class="product-title font-alt">{{$val['price']}}</h5>
                                        </td>
                                        <td class="pr-remove"><a href="/removedata/{{$val['service_id']}}" title="Remove"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input class="form-control" type="text" id="coupon" name="coupon" placeholder="Coupon code"/>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <button class="btn btn-round btn-g" id="applycode" type="submit">Apply</button>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-3">
                        <div class="form-group">
                            <button class="btn btn-block btn-round btn-d pull-right" type="submit">Update Cart</button>
                        </div>
                    </div>
                </div>
                <hr class="divider-w">
                <div class="row mt-70">
                    <div class="col-sm-5 col-sm-offset-7">
                        <div class="shop-Cart-totalbox">
                            <h4 class="font-alt">Cart Totals</h4>
                            <table class="table table-striped table-border checkout-table">
                                <tbody>
                                @php
                                $d=0;
                                @endphp
                                {{--@if(session()->has('coupon'))--}}
                                    {{--@php--}}
                                        {{--$d=session()->get('coupon.discoumt_amt');--}}
                                    {{--@endphp--}}
                                {{--@endif--}}
                                <tr class="shop-Cart-totalprice">
                                        <th>Cart Subtotal :</th>
                                        <td>{{$total}}</td>
                                </tr>
                                <tr class="shop-Cart-totalprice">
                                    <th>Discount Amount:</th>
                                    <td id="disamount">{{$d}}</td>
                                </tr>
                                <tr class="shop-Cart-totalprice">
                                    <th>Payable Total :</th>
                                    <td id="finalamount">{{$total-$d}}</td>
                                </tr>

                                </tbody>
                            </table>
                            <button class="btn btn-lg btn-block btn-round btn-d" type="submit"><a  href="{{url('/checkout')}}">Proceed to Checkout</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="module-small bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="widget">
                            <h5 class="widget-title font-alt">About Titan</h5>
                            <p>The languages only differ in their grammar, their pronunciation and their most common words.</p>
                            <p>Phone: +1 234 567 89 10</p>Fax: +1 234 567 89 10
                            <p>Email:<a href="#">somecompany@example.com</a></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="widget">
                            <h5 class="widget-title font-alt">Recent Comments</h5>
                            <ul class="icon-list">
                                <li>Maria on <a href="#">Designer Desk Essentials</a></li>
                                <li>John on <a href="#">Realistic Business Card Mockup</a></li>
                                <li>Andy on <a href="#">Eco bag Mockup</a></li>
                                <li>Jack on <a href="#">Bottle Mockup</a></li>
                                <li>Mark on <a href="#">Our trip to the Alps</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="widget">
                            <h5 class="widget-title font-alt">Blog Categories</h5>
                            <ul class="icon-list">
                                <li><a href="#">Photography - 7</a></li>
                                <li><a href="#">Web Design - 3</a></li>
                                <li><a href="#">Illustration - 12</a></li>
                                <li><a href="#">Marketing - 1</a></li>
                                <li><a href="#">Wordpress - 16</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="widget">
                            <h5 class="widget-title font-alt">Popular Posts</h5>
                            <ul class="widget-posts">
                                <li class="clearfix">
                                    <div class="widget-posts-image"><a href="#"><img src="assets/images/rp-1.jpg" alt="Post Thumbnail"/></a></div>
                                    <div class="widget-posts-body">
                                        <div class="widget-posts-title"><a href="#">Designer Desk Essentials</a></div>
                                        <div class="widget-posts-meta">23 january</div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="widget-posts-image"><a href="#"><img src="assets/images/rp-2.jpg" alt="Post Thumbnail"/></a></div>
                                    <div class="widget-posts-body">
                                        <div class="widget-posts-title"><a href="#">Realistic Business Card Mockup</a></div>
                                        <div class="widget-posts-meta">15 February</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="divider-d">
        <footer class="footer bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="copyright font-alt">&copy; 2017&nbsp;<a href="index.html">TitaN</a>, All Rights Reserved</p>
                    </div>
                    <div class="col-sm-6">
                        <div class="footer-social-links"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a href="#"><i class="fa fa-skype"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>
@endsection

@section('script')
    <script src="{{asset('assets')}}/js/main.js"></script>
    <script>
        $(document).ready(function(){
           $('#applycode').click(function(){
                var code=$('#coupon').val();
               $.ajax({
                   url:"{{url('/checkcouponcode')}}/"+code,
                   dataType:'json',
                   success:function(data){
                       $('.err').html(data.errmsg);
                       $('#disamount').html(data.disamount);
                       $('#finalamount').html(data.finalamount);
//                       console.log(data.errmsg);
//                       console.log(data.disamount);
//                       console.log(data.finalamount);
                   }
               });
           }) ;
        });
    </script>
@endsection