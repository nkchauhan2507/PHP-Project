@extends('Admin.adminmaster')

@section('membership')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i>Membership</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        {{--<h4 class="mb"><i class="fa fa-angle-right"></i> Inline Form</h4>--}}
                        <form class="form-inline" action="{{url('Admin/addmembership')}}" method="post" role="form">
                            @csrf
                            <div class="form-group">
                                {{--<label class="sr-only" for="exampleInputEmail2">Email address</label>--}}
                                &nbsp;<label style="color:black;">Membership Type</label><br>
                                <input type="text" name="mtype" class="form-control" placeholder="Enter Membership Type"><br><br>
                                &nbsp;<label style="color:black;">Description</label><br>
                                <textarea name="mdesc" class="form-control" placeholder="Enter Membership Description"></textarea></br><br>
                                &nbsp;<label style="color:black;">Membership Duration(in Months)</label><br>
                                <input type="number" name="duration" class="form-control" placeholder="Enter Membership Duration"></br><br>
                                &nbsp;<label style="color:black;">Membership Price</label><br>
                                <input type="number" name="price" class="form-control" placeholder="Enter Membership Price">
                                {{--<p> {{session()->get('msg')}}</p>--}}
                            </div></br></br>
                            <div id="msg"></div>
                            <button id="add" type="submit" class="btn btn-theme">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>

@endsection