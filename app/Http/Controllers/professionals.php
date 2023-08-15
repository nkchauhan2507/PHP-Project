<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\Models\users;
use App\Models\category;
use App\Models\subcategory;
use App\Models\professional;
use App\Models\service;
use App\Models\booking;
use App\Models\address;
use App\Models\usercity;
use App\Models\userstate;
use App\Models\usercountry;


class professionals extends Controller
{
    public function professional()
    {
        if(session()->has('professional'))
        {
            return view('professional/home');
        }
        else
        {
            return view('/professional/login');
        }
    }
    public function login()
    {
        return view('/professional/login');
    }
    public function logincheck(Request $request)
    {
        $data=$request->input();
        $result=users::join('professional','professional.u_id','user.u_id')->where(['user.email'=>$data['mail']],['user.password'=>$data['password']],['user.type'=>2])->first();
        if($result!='')
        {
            session()->put('professional',$result);
            return redirect('/professional/home');
        }
        else
        {
//            if($u->type!=2)
//            {
//                return redirect('/professional/login')->with('msg','You are Not Approved to be Professioanl');
//            }
//            else
//            {
                return redirect('/professional/login')->with('msg','Invalid E-mail or Password ');
//            }
        }
    }
    public function logout()
    {
        session()->pull('professional');
        return redirect('/professional/login');
    }
    public function service()
    {
        if(session()->has('professional'))
        {
            $data['cat']=category::all();
            $uid=session()->get('professional.u_id');
            $data['ser']=service::where('u_id',$uid)->get();
            return view('professional/service',$data);
        }
        else
        {
            return view('/professional/login');
        }
    }
    public function category($id)
    {
        $data=subcategory::where('category_id',$id)->get();
        foreach($data as $val)
        {
            echo "<option value=".$val->sc_id.">".$val->scname."</option>";
        }
    }
    public function addservice(Request $req)
    {
        $data=$req->input();
//        echo "<pre>";
//        print_r($data);
        $uid=session()->get('professional.u_id');
//        $prof=professional::where('u_id',$uid)->first();
//
//        foreach($data as $val)
//        {
            $ins=Array(
                'sname'=>$data['sname'],
                'description'=>$data['desc'],
                'price'=>$data['price'],
                'sc_id'=>$data['sc_id'],
                'u_id'=>$uid,
            );
            service::create($ins);
//        }
        return redirect('/professional/service');
    }
    public function prof($pfid)
    {
        $data['cat']=category::all();
        $data['prof']=professional::where('pf_id',$pfid)->first();
//        echo "<pre>";
//        print_r($data['prof']);
        return view('/professional/updateprof',$data);
    }
    public function updateprof(Request $req,$id)
    {
        $data=$req->input();
        $upd=Array(
            'shopname'=>$data['shopname'],
        );
        professional::where('pf_id',$id)->update($upd);
        return redirect('/professional/service');
    }
    public function deleteservice($pfid)
    {
        professional::where('pf_id',$pfid)->delete();
        return redirect('/professional/service');
    }
    public function order()
    {
        if(session()->has('professional'))
        {
            $pfuid=session()->get('professional.u_id');
            $data['book']=booking::join('booking_details','booking_details.booking_id','booking.booking_id')->join('service','service.service_id','booking_details.service_id')->where('service.u_id',$pfuid)->get();
            $data['address']=booking::join('user','user.u_id','booking.u_id')->join('address','address.address_id','user.address_id')->get();
//            $data['city']=address::join('ucity','ucity.city_id','address.city_id')->join('tbl_cities','tbl_cities.id','ucity.city_id')->where('address.city_id',$data['address']->city_id)->get();
//            echo "<pre>";
//            print_r($data['address']);
            return view('/professional/order',$data);
        }
        else
        {
            return redirect('/professional/login');
        }
    }
}
