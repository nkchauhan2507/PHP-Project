@extends('master')

@section('forgotpass')
    <div class="main">

        <section class="module">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-sm-offset-1 mb-sm-40">
                        <h4 class="font-alt">Forgot Password</h4>
                        <hr class="divider-w mb-10">
                        <span style="color:green;">{{session()->get('message')}}</span>
                        <form class="form" action="{{url('sendlink')}}" method="post">
                            @csrf
                            <div class="form-group">
                                {{--<input class="form-control" id="email" type="text" name="email" placeholder="Enter Registered Email"/>--}}
                                <input type="email" name="email" class="form-control" placeholder="Enter Registered Email">
                                {{--@error('email') <span style="color:red;"> {{$message}} </span> @enderror--}}
                                <span style="color:Red;">{{session()->get('forpasmsg')}}</span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-round btn-b">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection