<?php

namespace App\Http\Controllers;

use Mail;
use DB;
use Illuminate\Http\Request;

use App\Models\subcategory;
use App\Models\users;
use App\Models\country;
use App\Models\city;
use App\Models\state;
use App\Models\usercity;
use App\Models\userstate;
use App\Models\usercountry;
use App\Models\address;
use App\Models\category;
use App\Models\professional;
use App\Models\service;
use App\Models\cart;
use App\Models\coupon;
use App\Models\booking;
use App\Models\bookingdetails;
use App\Models\membership;

class user extends Controller
{
    public function f1()
    {
        $data['cat']=category::all();
        $data['mem']=membership::all();
        return view('/home',$data);
    }
    public function f2()
    {
        $data['cnt']=country::all();
        return view('registration',$data);
    }
    public function f3(Request $req)
    {
        $data=$req->input();
//        echo "<pre>";
//        print_r($data);
//        $req->validate([
//            'cname'=>'required|alpha|max:15',
//            'email'=>'required|email:rfc,dns',
//            'gender'=>'required',
//            'phoneno'=>'required|digits:11',
//            'password'=>'required|alpha_num',
////            'utype'=>'required',
//            'DOB'=>'required|date',
//
//            'city'=>'required|alpha_num|max:50',
//            'state'=>'required|alpha_num|max:50',
//            'country'=>'required|alpha_num|max:50',
//            'address'=>'required|alpha_num|max:1500',
//            'pincode'=>'required|digits:6',
//        ]);
        $cityname=city::where('id',$data['city'])->first();
        $insertcity=Array(
            'cityname'=>$cityname->name,
            'state_id'=>$data['state'],
        );
        $cityid=usercity::create($insertcity)->city_id;

        $statename=state::where('id',$data['state'])->first();
        $insertstate=Array(
            'statename'=>$statename->name,
            'country_id'=>$data['country'],
        );
        $stateid=userstate::create($insertstate)->state_id;

        $countryname=country::where('id',$data['country'])->first();
        $insertcountry=Array(
            'countryname'=>$countryname->name,
        );
        $countryid=usercountry::create($insertcountry)->country_id;
        $insertadd=Array(
            'address'=>$data['address'],
            'pincode'=>$data['pincode'],
            'city_id'=>$cityid,
            'state_id'=>$stateid,
            'country_id'=>$countryid,
        );
//        print_r($insertadd);
        $addid=address::create($insertadd)->address_id;

        $insert=Array(
            'cust_name' => $data['cname'],
            'email' => $data['email'],
            'phoneno' => $data['phoneno'],
            'gender' => $data['gender'],
            'DOB' => $data['DOB'],
            'password' => $data['password'],
//            'type' => $data['utype'],
            'address_id'=>$addid,
        );
//        print_r($insert);
        $ins=users::create($insert);
      return redirect('/login');
    }
    public function f4($id)
    {
        $statedata=state::where('country_id',$id)->get();

        foreach($statedata as $val)
        {
            echo "<option value='".$val->id."'>".$val->name."</option>";
        }
    }
    public function f5($id)
    {
        $citydata=city::where('state_id',$id)->get();

        foreach($citydata as $v)
        {
            echo "<option value='".$v->id."'>".$v->name."</option>";
        }
    }
    public function login()
    {
        return view('login');
    }
    public function logintest(Request $req)
    {
        $data=$req->input();
        $res=users::where(['email'=>$data['email'],'password'=>$data['password']])->first();
        if($res!='')
        {
            session()->put('user',$res);
            return redirect('home');
        }
        else
        {
            session()->flash('msg','Enter correct email or password');
            return redirect('login')->with('msg','Invalid Username or Password');
        }
    }
    public function logout()
    {
        session()->pull('user');
        session()->pull('cart');
        return redirect('home');
    }
    public function professional()
    {
        $data['cnt']=country::all();
        $data['cat']=category::all();
        if(session()->has('user'))
        {
            return view('/professional',$data);
        }
        else
        {
            return view('/home');
        }

    }
    public function regprof(Request $req,$id)
    {
        $req->validate([
            'pname'=>'required',
            'shopname'=>'required',
            'gst'=>'required|alpha_num|size:15',
            'city'=>'required',
        ]);
       $data=$req->input();
       $addprof=Array(
           'Name'=>$data['pname'],
           'shopname'=>$data['shopname'],
           'gst'=>$data['gst'],
           'city'=>$data['city'],
           'u_id'=>$id,
       );
//        echo "<pre>";
//        print_r($data);
        professional::create($addprof);
        return redirect('/home')->with('msgp','Your Request Has been Submitted to be A Professional');
    }
    public function sendmail()
    {
        Mail::send([],[],function($message){
            $message->to('narayanchauhan481@gmail.com')
                ->subject('Testing Sending Mail')
                ->setBody('This is Test Mail');
        });
    }
    public function forgetpass()
    {
        return view('forgotpassword');
    }
    public function sendlink(Request $req)
    {
        $data=$req->input();
        $userdata=users::where('email',$data['email'])->first();
        if($userdata!='')
        {
            $data['token']=rand('111111','999999');
            users::where('email',$userdata->email)->update(Array('token'=>$data['token']));
            Mail::send('emailview',$data,function($message) use ($userdata){
               $message->to($userdata['email'])
                   ->subject('Forgot Password');
            });
            return redirect('forgotpassword')->with('message','Please,Check your Email');
        }
        else
        {
            return redirect('forgotpassword')->with('forpasmsg','Enter Registered Email Address');
        }
    }
    public function resetpassword($token)
    {
        $data['token']=$token;
        return view('/resetpassword',$data);
    }
    public function reset(Request $req)
    {
        $data=$req->input();
        if($data['password']==$data['cpassword'])
        {
            $updpass=Array(
                'password'=>$data['password'],
            );
            users::where('token',$data['token'])->update($updpass);
            return redirect('/login')->with('passreset','Password Reset Successfully');
        }
        else
        {
            return redirect('/resetpassword/'.$data["token"])->with('msg','Password And Confirm Password should be Same');
        }
    }
    public function categorydata($cid)
    {
//        echo $cid;
        $info['subcat']=subcategory::where('category_id',$cid)->get();
        return view('/category',$info);
    }
    public function servicedisplay($id)
    {
        $data['ser']=service::where('sc_id',$id)->get();
        return view('servicedisplay',$data);
    }
    public function servicedetail($sid)
    {
        $data['service']=service::where('service_id',$sid)->first();
        $data['prof']=professional::where('u_id',$data['service']->u_id)->first();
//        echo "<pre>";
//         print_r($data['service']);
//        print_r($data['prof']);
        return view('servicedetail',$data);
    }
    public function addcart(Request $req,$sid)
    {
        if(session()->has('user'))
        {
            $data = $req->input();

            $service = service::where('service_id', $sid)->first();
            $cart = session()->get('cart');
            if (!$cart) {
                $cart[$sid] = Array(
                    'sname' => $service['sname'],
                    'price' => $service['price'],
//                'qty'=>$data['qty'],
                    'service_id' => $sid,
                    'u_id' => session()->get('user.u_id'),
//                'pf_u_id'=>$data[$sid]['pf_u_id'],
//                'pf_u_id'=>$service['u_id'],
                );
                session()->put('cart', $cart);
                return redirect()->back()->with('addmsg', 'Product Added in Your Cart Successfully');
            } else {
                if (isset($cart[$sid])) {
//                $cart[$sid]['qty']++;
//                session()->put('cart',$cart[$sid]);
                    return redirect()->back()->With('msg', 'Product Already Exists in Your Cart');
                } else {
                    $cart[$sid] = Array(
                        'sname' => $service['sname'],
                        'price' => $service['price'],
                        'service_id' => $sid,
                        'u_id' => session()->get('user.u_id'),
//                    'pf_u_id'=>$service['u_id'],
                    );

                    session()->put('cart', $cart);
                    return redirect()->back()->with('addmsg', 'Product Added in Your Cart Successfully');
                }
            }
        }
        else
        {
            return redirect('/login');
        }
    }
    public function cart()
    {
        $data['cart']=session()->get('cart');
        if(session()->has('user'))
        {
            if($data['cart']!='')
            {
                session()->pull('coupon');
                return view('cart',$data);
            }
            else
            {
                return redirect('home')->with('emptymsg','Your Cart Is Empty,Dear!!');
            }

        }
        else
        {
            return redirect('/login');
        }
    }
    public function removedata($sid)
    {
        $data[$sid]=session()->get('cart');
        session()->forget($data[$sid]);
        return redirect()->back();
    }
    public function checkcouponcode($code)
    {
//        echo $code;
        $cart=session()->get('cart');
        $total=0;
        $d=Array(
            'errmsg'=>'',
            'disamount'=>0,
            'finalamount'=>0,
        );
        session()->pull('coupon');
        //echo "Reach";
        if($cart!='')
        {
            foreach ($cart as $val)
            {
                $total+=$val['price'];
                $d['finalamount']=$total;
            }
            if(session()->has('user'))
            {
                $uid=session()->get('user.u_id');
                $order=booking::join('coupon','coupon.coupon_id','booking.coupon_id')->where([['coupon.coupon_code', $code],['booking.u_id',$uid]])->get();
            }
            $coupon=coupon::where([['coupon_code',$code],['coupon_type',0]])->first();
            if($coupon!='')
            {
                if($coupon->u_id==0 or (session()->has('user') && $coupon->u_id==$uid) )
                {
                    if($total>=$coupon->minimum_amt)
                    {
                        if($coupon->coupon_type==0)
                        {
                            $discount=$coupon->discount_amt;
                        }
                        else /* if($coupon->coupon_type==1)*/
                        {
                            $discount=$total*$coupon->discount_amt/100;
                        }
                        $d['errmsg']="Coupon Applied Successfully";
                        $d['disamount']=$discount;
                        $d['finalamount']=$total-$discount;
                        $ccode=Array(
                            'coupon_code'=>$code,
                            'discount_amt'=>$discount,
                        );
                        session()->put('coupon',$ccode);
//                        if(count($order)<$coupon->no_use)
//                        {
//                            echo "Valid Coupon code";
//                        }
//                        else
//                        {
//                            echo "This coupon is Already Used";
//                        }
                    }
                    else
                    {
                        $d['errmsg']="your order Amount is Not Eligible for Coupon";
                    }
                }
                else
                {
                    $d['errmsg']="Not valid for this user";
                }
            }
            else
            {
                $d['errmsg']="invalid coupon code";
            }
        }else {
            $d['errmsg']="your cart is Empty";
        }
        echo json_encode($d);
    }

    public function checkout()
    {
        $data['cart']=session()->get('cart');
//        echo "<pre>";
//        print_r($data['cart']);
        return view('checkout',$data);
    }
    public function payment(Request $req)
    {
        $data = $req->input();
//        print_r($data);
        if (session()->has('coupon')) {
            $damount = session()->get('coupon.discount_amt');
            $ccode = session()->get('coupon.coupon_code');
            $cid = coupon::where('coupon_code', $ccode)->first();
            $couponid = $cid->coupon_id;
        } else {
            $damount = 0;
            $couponid = 0;
        }
        $current_date = date('Y-m-d');
        $book=Array(
            'u_id' => session()->get('user.u_id'),
            'apt_date' => $data['apt_date'],
            'apt_time' => $data['apt_time'],
            'booking_status'=>1,
            'payment_status' => 0,
            'coupon_id' => $couponid,
            'total' => $data['total'],
            'payment_type' => 1,  /*1-Digital Banking */
            'booking_date' => $current_date,
            'discount_amt' => $damount,
        );
        print_r($book);
        $bid =booking::create($book)->booking_id;
        print_r($bid);
        $cart = session()->get('cart');
        print_r($cart);
        foreach($cart as $val)
        {
            $sid = service::where('sname', $val['sname'])->first();
            $bookingdetail=Array(
                'booking_id' => $bid,
                'service_id' => $sid->service_id,
                'price' => $val['price'],
            );
            print_r($bookingdetail);
            \DB::table('booking_details')->insert($bookingdetail);
        }
        session()->pull('cart');
        session()->pull('coupon');
    }
    public function buymembership(Request $req,$uid)
    {
        $mem=$req->input();
        session()->pull('membership');
        if($mem!='')
        {
            session()->put('membership',$mem);
            return view('membershipcheckout');
        }
        else
        {
            return redirect('home');
        }
    }
    public function membershippayment(Request $req)
    {
        print_r('hiiii');
//        $data=$req->input();
//        print_r($data);
    }
}