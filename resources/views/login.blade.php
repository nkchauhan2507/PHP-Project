@extends('master')

@section('login')
    <div class="main">

        <section class="module">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-sm-offset-1 mb-sm-40">
                        <h4 class="font-alt">Login</h4>
                        <hr class="divider-w mb-10">
                        <span style="color:green;">{{session()->get('passreset')}}</span>
                        <form class="form" action="{{url('logintest')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" id="email" type="text" name="email" placeholder="Enter Email"/>
                                {{--@error('email') <span style="color:red;"> {{$message}} </span> @enderror--}}
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="password" type="password" name="password" placeholder="Password"/>
                                {{--@error('password') <span style="color:red;"> {{$message}} </span> @enderror--}}
                            </div>
                            <div class="form-group">
                                    <span style="color:red;">{{session()->get('msg')}}</span>
                            </div>
                            <div class="form-group" style="text-align:Right;"><a href="/forgotpassword">Forgot Password?</a></div>
                            <div class="form-group">
                                {{--<button class="btn btn-round btn-b">Login</button>--}}
                                <button class="btn btn-b btn-circle">Login</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection