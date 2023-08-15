<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--
    Document Title
    =============================================
    -->
    <title>UrbanClap-Everything at your Home</title>
    <!--
    Favicons
    =============================================
    -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('assets')}}/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('assets')}}/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets')}}/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets')}}/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets')}}/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets')}}/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets')}}/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets')}}/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets')}}/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets')}}/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets')}}/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets')}}/images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets')}}/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!--
    Stylesheets
    =============================================

    -->
    <!-- Default stylesheets-->
    <link href="{{asset('assets')}}/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="{{asset('assets')}}/lib/animate.css/animate.css" rel="stylesheet">
    <link href="{{asset('assets')}}/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="{{asset('assets')}}/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="{{asset('assets')}}/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="{{asset('assets')}}/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/membershipstyle.css" rel="stylesheet">   <!--Membership Style CSS-->
    <link id="color-scheme" href="{{asset('assets')}}/css/colors/default.css" rel="stylesheet">
</head>
<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
<main>
    <div class="page-loader">
        <div class="loader">Loading...</div>
    </div>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="{{url('home')}}">Urban Clap</a>
            </div>
            <div class="collapse navbar-collapse" id="custom-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a href="/home">Home</a>
                    </li>
                    <li class="dropdown"><a href="/home" >All Service</a>
                        <ul class="dropdown-menu" role="menu">
                            @php
                                $cate=\DB::table('category')->get();
                            @endphp
                            @foreach($cate as $c)
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown">{{$c->cname}}</a>
                                    <ul class="dropdown-menu">
                                        @php
                                            $subcat=\DB::table('sub_category')->where(array('sub_category.category_id' => $c->category_id))->get();
                                        @endphp
                                        @foreach($subcat as $sub)
                                            <li><a href="{{url('subcatdata')}}/{{$sub->sc_id}}">{{$sub->scname}}</a></li>
                                        @endforeach
                                    </ul>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @php
                        $id=session()->get('user.u_id');
                        $userdata=\DB::table('user')->where('u_id',$id)->first();
                        $prof=\DB::table('professional')->where('u_id',$id)->first();
                    @endphp
                    @if(session()->has('user'))
                        @if($userdata->type!=2 or $prof=='')
                            <li class="dropdown"><a href="/professional/register" >Register As a Professional</a></li>
                        @endif
                    @endif
                    @if(session()->has('user'))
                        <li class="dropdown"><a href="/home">Welcome, {{session()->get('user.cust_name')}}</a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown">
                                    <a href="/logout">Logout</a>
                                    <a href="/cart">Cart</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li><a href="/login">Login</a></li>
                        <li><a href="/registration">Register</a></li>
                    @endif
                    {{--<li class="dropdown"><a class="" href="#" data-toggle="dropdown">Portfolio</a>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Boxed</a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a href="portfolio_boxed_col_2.html">2 Columns</a></li>--}}
                                    {{--<li><a href="portfolio_boxed_col_3.html">3 Columns</a></li>--}}
                                    {{--<li><a href="portfolio_boxed_col_4.html">4 Columns</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Boxed - Gutter</a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a href="portfolio_boxed_gutter_col_2.html">2 Columns</a></li>--}}
                                    {{--<li><a href="portfolio_boxed_gutter_col_3.html">3 Columns</a></li>--}}
                                    {{--<li><a href="portfolio_boxed_gutter_col_4.html">4 Columns</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Full Width</a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a href="portfolio_full_width_col_2.html">2 Columns</a></li>--}}
                                    {{--<li><a href="portfolio_full_width_col_3.html">3 Columns</a></li>--}}
                                    {{--<li><a href="portfolio_full_width_col_4.html">4 Columns</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Full Width - Gutter</a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a href="portfolio_full_width_gutter_col_2.html">2 Columns</a></li>--}}
                                    {{--<li><a href="portfolio_full_width_gutter_col_3.html">3 Columns</a></li>--}}
                                    {{--<li><a href="portfolio_full_width_gutter_col_4.html">4 Columns</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Masonry</a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Boxed</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="portfolio_masonry_boxed_col_2.html">2 Columns</a></li>--}}
                                            {{--<li><a href="portfolio_masonry_boxed_col_3.html">3 Columns</a></li>--}}
                                            {{--<li><a href="portfolio_masonry_boxed_col_4.html">4 Columns</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Full Width</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="portfolio_masonry_full_width_col_2.html">2 Columns</a></li>--}}
                                            {{--<li><a href="portfolio_masonry_full_width_col_3.html">3 Columns</a></li>--}}
                                            {{--<li><a href="portfolio_masonry_full_width_col_4.html">4 Columns</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Hover Style</a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a href="portfolio_hover_black.html">Black</a></li>--}}
                                    {{--<li><a href="portfolio_hover_gradient.html">Gradient</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Single</a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Featured Image</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="portfolio_single_featured_image1.html">Style 1</a></li>--}}
                                            {{--<li><a href="portfolio_single_featured_image2.html">Style 2</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Featured Slider</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="portfolio_single_featured_slider1.html">Style 1</a></li>--}}
                                            {{--<li><a href="portfolio_single_featured_slider2.html">Style 2</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Featured Video</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="portfolio_single_featured_video1.html">Style 1</a></li>--}}
                                            {{--<li><a href="portfolio_single_featured_video2.html">Style 2</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="dropdown"><a class="" href="#" data-toggle="dropdown">Blog</a>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Standard</a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a href="blog_standard_left_sidebar.html">Left Sidebar</a></li>--}}
                                    {{--<li><a href="blog_standard_right_sidebar.html">Right Sidebar</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Grid</a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a href="blog_grid_col_2.html">2 Columns</a></li>--}}
                                    {{--<li><a href="blog_grid_col_3.html">3 Columns</a></li>--}}
                                    {{--<li><a href="blog_grid_col_4.html">4 Columns</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Masonry</a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a href="blog_grid_masonry_col_2.html">2 Columns</a></li>--}}
                                    {{--<li><a href="blog_grid_masonry_col_3.html">3 Columns</a></li>--}}
                                    {{--<li><a href="blog_grid_masonry_col_4.html">4 Columns</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Single</a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a href="blog_single_left_sidebar.html">Left Sidebar</a></li>--}}
                                    {{--<li><a href="blog_single_right_sidebar.html">Right Sidebar</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="dropdown"><a class="" href="#" data-toggle="dropdown">Features</a>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li><a href="alerts-and-wells.html"><i class="fa fa-bolt"></i> Alerts and Wells</a></li>--}}
                            {{--<li><a href="buttons.html"><i class="fa fa-link fa-sm"></i> Buttons</a></li>--}}
                            {{--<li><a href="tabs_and_accordions.html"><i class="fa fa-tasks"></i> Tabs &amp; Accordions</a></li>--}}
                            {{--<li><a href="content_box.html"><i class="fa fa-list-alt"></i> Contents Box</a></li>--}}
                            {{--<li><a href="forms.html"><i class="fa fa-check-square-o"></i> Forms</a></li>--}}
                            {{--<li><a href="icons.html"><i class="fa fa-star"></i> Icons</a></li>--}}
                            {{--<li><a href="progress-bars.html"><i class="fa fa-server"></i> Progress Bars</a></li>--}}
                            {{--<li><a href="typography.html"><i class="fa fa-font"></i> Typography</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="dropdown"><a class="" href="#" data-toggle="dropdown">Shop</a>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Product</a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a href="shop_product_col_3.html">3 columns</a></li>--}}
                                    {{--<li><a href="shop_product_col_4.html">4 columns</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li><a href="shop_single_product.html">Single Product</a></li>--}}
                            {{--<li><a href="shop_checkout.html">Checkout</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="dropdown"><a class="" href="documentation.html" data-toggle="dropdown">Documentation</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li><a href="documentation.html#contact">Contact Form</a></li>--}}
                            {{--<li><a href="documentation.html#reservation">Reservation Form</a></li>--}}
                            {{--<li><a href="documentation.html#mailchimp">Mailchimp</a></li>--}}
                            {{--<li><a href="documentation.html#gmap">Google Map</a></li>--}}
                            {{--<li><a href="documentation.html#plugin">Plugins</a></li>--}}
                            {{--<li><a href="documentation.html#changelog">Changelog</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--@if(session()->has('user'))--}}
                        {{--<li><a style=":hover{cursor:pointer !important;}">welcome,{{session()->get('user.name')}}</a></li>--}}
                        {{--<li><a href="/logout">Logout</a></li>--}}
                    {{--@else--}}

                    {{--@endif--}}
                </ul>
            </div>
        </div>
    </nav>
    <script src="{{asset('assets')}}/lib/jquery/dist/jquery.js"></script>
    {{--<script src="{{asset('assets')}}/js/jquery-3.6.0.js"></script>--}}
    <script src="{{asset('assets')}}/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/lib/wow/dist/wow.js"></script>
    <script src="{{asset('assets')}}/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js"></script>
    <script src="{{asset('assets')}}/lib/isotope/dist/isotope.pkgd.js"></script>
    <script src="{{asset('assets')}}/lib/imagesloaded/imagesloaded.pkgd.js"></script>
    <script src="{{asset('assets')}}/lib/flexslider/jquery.flexslider.js"></script>
    <script src="{{asset('assets')}}/lib/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="{{asset('assets')}}/lib/smoothscroll.js"></script>
    <script src="{{asset('assets')}}/lib/magnific-popup/dist/jquery.magnific-popup.js"></script>
    <script src="{{asset('assets')}}/lib/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>
    <script src="{{asset('assets')}}/js/plugins.js"></script>
    <script src="{{asset('assets')}}/js/main.js"></script>


    {{--<script src="{{asset('assets')}}/lib/jquery/dist/jquery.js"></script>--}}
    {{--<script src="{{asset('assets')}}/lib/bootstrap/dist/js/bootstrap.min.js"></script>--}}
    {{--<script src="{{asset('assets')}}/lib/wow/dist/wow.js"></script>--}}
    {{--<script src="{{asset('assets')}}/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js"></script>--}}
    {{--<script src="{{asset('assets')}}/lib/isotope/dist/isotope.pkgd.js"></script>--}}
    {{--<script src="{{asset('assets')}}/lib/imagesloaded/imagesloaded.pkgd.js"></script>--}}
    {{--<script src="{{asset('assets')}}/lib/flexslider/jquery.flexslider.js"></script>--}}
    {{--<script src="{{asset('assets')}}/lib/owl.carousel/dist/owl.carousel.min.js"></script>--}}
    {{--<script src="{{asset('assets')}}/lib/smoothscroll.js"></script>--}}
    {{--<script src="{{asset('assets')}}/lib/magnific-popup/dist/jquery.magnific-popup.js"></script>--}}
    {{--<script src="{{asset('assets')}}/lib/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>--}}
    {{--<script src="{{asset('assets')}}/js/plugins.js"></script>--}}
    {{--<script src="{{asset('assets')}}/js/main.js"></script>--}}
    {{--<script src="{{asset('assets')}}/js/jquery-3.6.0.js"></script>--}}
