<?php

namespace App\Http\Controllers;
use App\Models\professional;
use Illuminate\Http\Request;
use App\Models\admins;
use App\Models\category;
use App\Models\subcategory;
use App\Models\service;
use App\Models\users;
use App\Models\coupon;
use App\Models\booking;
use App\Models\state;
use App\Models\usercity;
use App\Models\country;
use App\Models\membership;

class admin extends Controller
{
    public function adminside()
    {
        if(session()->has('admin'))
        {
            return view('/Admin/home');
        }
        else
        {
            return redirect('/Admin/login')->with('msg','Incorrect Username or Password');
        }
    }
    public function login()
    {
        return view('Admin/login');
    }
    Public function logintest(Request $data)
    {
        $result=$data->input();
//        echo "<pre>";
//        print_r($result);
        $res=admins::where(['Username'=>$result['mail'],'Password'=>$result['password']])->first();
        echo "<pre>";
        print_r($res);
        if($res=='')
        {
            return redirect('Admin/login')->with('msg','Incorrect Username or Password');
        }
        else
        {
            session()->put('admin',$res);
            return redirect('/Admin/home');
        }
    }
    public function logout()
    {
        session()->pull('admin');
        return redirect('/Admin/login');
    }
    public function category()
    {
        $cat=category::all();
        if(session()->has('admin'))
        {
            return view('Admin/category',compact('cat'));
        }
        else
        {
            return redirect('Admin/login')->with('msg','Incorrect Username or Password');
        }
    }
    public function addcategory(Request $data)
    {
        $cat=$data->input();
        $insertcategory=Array(
            'cname'=>$cat['cname'],
        );
        category::create($insertcategory);
//        session()->flash('msg',' &#9989 Category added Successfully');
        return redirect('Admin/category');
//        return redirect('Admin/subcategory');
    }
    public function subcategory()
    {
        $data['cat']=category::all();
        $data['subcat']=subcategory::all();
        if(session()->has('admin'))
        {
            return view('Admin/subcategory',$data);
        }
        else
        {
            return redirect('Admin/login')->with('msg','Incorrect Username or Password');
        }
    }
    public function addsubcategory(Request $request)
    {
        $data=$request->input();
        $inssubcat=Array(
            'scname'=>$data['scname'],
            'category_id'=>$data['c_id'],
        );
        subcategory::create($inssubcat);
        return redirect('Admin/subcategory');
    }
    public function service()
    {
        $data['sub']=subcategory::all();
        $data['ser']=service::all();
        if(session()->has('admin'))
        {
            return view('Admin/service',$data);
        }
        else
        {
            return redirect('Admin/login')->with('msg','Incorrect Username or Password');
        }
    }
    public function addservice(Request $request)
    {
        $data=$request->input();
        $insservice=Array(
            'sname'=>$data['sname'],
            'description'=>$data['desc'],
            'price'=>$data['price'],
            'sc_id'=>$data['sc_id'],
            'u_id'=>session()->get('admin.ad_id'),
        );
        service::create($insservice);
        return redirect()->back();
    }
    public function updatecategory($id)
    {
        $data['cat']=category::where('category_id',$id)->first();
//        echo "<pre>";
//        print_r($data['cat']);
        return view('/Admin/updatecategory',$data);
    }
    public function updatedcat(Request $res,$id)
    {
        $data=$res->input();
        $updcat=Array(
                'cname'=>$data['cname'],
        );
        category::where('category_id',$id)->update($updcat);
        return redirect('Admin/category')->with('msg','Updated Successfully');
    }
    public function updatesubcategory($id)
    {
        $result['subcate']=subcategory::where('sc_id',$id)->first();
        return view('/Admin/updatesubcategory',$result);
    }
    public function updatedsubcategory(Request $res,$id)
    {
        $data=$res->input();
//        echo "<pre>";
//        print_r($data);
        $updsubcate=Array(
            'scname'=>$data['scname'],
        );
        subcategory::where('sc_id',$id)->update($updsubcate);
        return redirect('Admin/subcategory')->with('msgupd','Updated successfully');
    }
    public function updateservice($sid)
    {
        $data['service']=service::where('service_id',$sid)->first();
//        echo "<pre>";
//        print_r($data);
        return view('/Admin/updateservice',$data);
    }
    public function updatedservice(Request $req,$sid)
    {
        $data=$req->input();
        echo "<pre>";
        print_r($data);
        $updservice=Array(
            'sname'=>$data['sname'],
            'description'=>$data['desc'],
            'price'=>$data['price'],
        );
        service::where('service_id',$sid)->update($updservice);
        return redirect('/Admin/service')->with('updmsg','Updated Successfully');
    }
    public function deletecategory($id)
    {
        category::where('category_id',$id)->delete();
        return redirect('/Admin/category')->with('msgdlt','Deleted successfully');
    }
    public function deletesubcategory($id)
    {
        subcategory::where('sc_id',$id)->delete();
        return redirect('/Admin/subcategory')->with('msgdlt','Deleted successfully');
    }
    public function deleteservice($sid)
    {
        service::where('service_id',$sid)->delete();
        return redirect('/Admin/service')->with('updmsg','Deleted Successfully');
    }
    public function professional()
    {
        $data['userprof']=users::join('Professional','Professional.u_id','user.u_id')->get();
        return view('Admin/Professional',$data);
    }
    public function approval($id)
    {
        $adminapproval=Array(
            'Approve'=>1,
        );
        $userapproval=Array(
            'type'=>2,
        );
        professional::where('u_id',$id)->update($adminapproval);
//        $profexist=professional::where('u_id',$id)->first();
        users::where('u_id',$id)->update($userapproval);
        return redirect('/Admin/professional');
    }
    public function deleteprof($id)
    {
        $delprof=professional::where('u_id',$id)->delete();
        $prof=professional::where('u_id',$id)->first();
        if($prof=='')
        {
            users::where('u_id',$id)->update(Array('type'=>1));
        }
        return redirect('/Admin/professional');
    }
    public function disapproval($id)
    {
        $adminapproval=array('Approve'=>0);
        $userapproval=array('type'=>1);
        professional::where('u_id',$id)->update($adminapproval);
        users::where('u_id',$id)->update($userapproval);
        return redirect('/Admin/professional');

    }
    public function coupon()
    {
        $data['user']=users::all();
        $data['coupon']=coupon::all();
        return view('/Admin/coupon',$data);
    }
    public function couponcode($code)
    {
        $data=coupon::where('coupon_code',$code)->first();
//        echo "<pre>";
//        print_r($data);
        if($data=='')
        {
            echo "0";
        }
        else
        {
            echo "1";
        }
    }
    public function addcoupon(Request $request)
    {
        $data=$request->input();
        $ccode=coupon::where('coupon_code',$data['ccode'])->first();
        if($ccode=='')
        {
            $ins=Array(
                'coupon_code'=>$data['ccode'],
                'u_id'=>$data['u_id'],
                'discount_amt'=>$data['damount'],
                'minimum_amt'=>$data['minamount'],
//                'minamount'=>$data['noofuse'],
                'coupon_type'=>$data['ctype'],
                'start_date'=>$data['sdate'],
                'end_date'=>$data['edate'],
                'no_use'=>$data['noofuse'],
            );
            coupon::create($ins);
            return redirect('Admin/coupon');
        }
        else
        {
            return redirect('Admin/coupon')->with('msg','Code Already Exists');
        }
    }
    public function updatecoupon($cid)
    {
        $data['val']=coupon::where('coupon_id',$cid)->first();
        return view('Admin/updatecoupon',$data);
    }
    public function updatingcoupon(Request $d,$cid)
    {
        $data=$d->input();
        $updcoupon=Array(
            'coupon_code'=>$data['ccode'],
            'u_id'=>$data['u_id'],
            'discount_amt'=>$data['damount'],
            'minimum_amt'=>$data['minamount'],
            'coupon_type'=>$data['ctype'],
            'start_date'=>$data['sdate'],
            'end_date'=>$data['edate'],
            'no_use'=>$data['noofuse'],
        );
        coupon::where('coupon_id',$cid)->update($updcoupon);
        return redirect('/Admin/coupon');
    }
    public function deletecoupon($cid)
    {
        coupon::where('coupon_id',$cid)->delete();
        return redirect('/Admin/coupon');
    }
    public function booking()
    {
        $data['book']=booking::join('booking_details','booking_details.booking_id','booking.booking_id')->get();
//        echo "<pre>";
//        print_r($data['book']);
        return view('Admin/booking',$data);
    }
    public function membership()
    {
        return view('Admin/membership');
    }
    public function addmembership(Request $req)
    {
        $data=$req->input();
        $insmember=Array(
            'type'=>$data['mtype'],
            'description'=>$data['mdesc'],
            'duration'=>$data['duration'],
            'price'=>$data['price'],
        );
        membership::create($insmember);
        return redirect()->back();
    }

}
