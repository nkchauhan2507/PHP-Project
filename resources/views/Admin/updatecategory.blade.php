@extends('Admin.adminmaster')

@section('updatecategory')

    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-gears">&nbsp;&nbsp;&nbsp;</i>Update Category</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        {{--<h4 class="mb"><i class="fa fa-angle-right"></i> Inline Form</h4>--}}
                        <form class="form-inline" action="{{url('Admin/updatedcat')}}/{{$cat->category_id}}" method="post" role="form">
                            @csrf
                            <div class="form-group">
                                {{--<label class="sr-only" for="exampleInputEmail2">Email address</label>--}}
                                &nbsp;<label style="color:black;">Category Name</label></br>
                                <input type="text" name="cname" class="form-control" placeholder="Enter Categpry Name" value="{{$cat->cname}}">
                                {{--<p> {{session()->get('msg')}}</p>--}}
                            </div></br></br>
                            <div id="msg"></div>
                            <button id="add" type="submit" class="btn btn-theme">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection