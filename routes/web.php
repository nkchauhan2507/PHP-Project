<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user;
use App\Http\Controllers\admin;
use App\Http\Controllers\professionals;

Route::get('/home',[user::class,'f1']);
Route::get('/',[user::class,'f1']);
Route::get('/registration',[user::class,'f2']);
Route::post('/signup',[user::class,'f3']);
Route::get('/countrydata/{id}',[user::class,'f4']);
Route::get('/citydata/{id}',[user::class,'f5']);
Route::get('/login',[user::class,'login']);
Route::post('/logintest',[user::class,'logintest']);
Route::get('/logout',[user::class,'logout']);
Route::get('/professional/register',[user::class,'professional']);
Route::post('/professionalregister/{id}',[user::class,'regprof']);
Route::get('/sendmail',[user::class,'sendmail']);
Route::get('/forgotpassword',[user::class,'forgetpass']);
Route::post('/sendlink',[user::class,'sendlink']);
Route::get('/sendlink/{token}',[user::class,'resetpassword']);
Route::post('/reset',[user::class,'reset']);
Route::get('/categorydata/{cid}',[user::class,'categorydata']);
Route::get('/subcatdata/{cid}',[user::class,'subcatdata']);
Route::get('/service/{scid}',[user::class,'servicedisplay']);
Route::get('/servicedetail/{s_id}',[user::class,'servicedetail']);
Route::get('/addcart/{s_id}',[user::class,'addcart']);
Route::get('/cart',[user::class,'cart']);
Route::get('/removedata/{sid}',[user::class,'removedata']);
Route::get('/checkcouponcode/{code}',[user::class,'checkcouponcode']);
Route::get('/checkout',[user::class,'checkout']);
Route::any('/payment',[user::class,'payment']);
Route::post('/buymembership/{uid}',[user::class,'buymembership']);
Route::any('/membershippayment',[user::class,'membershippayment']);





Route::get('/Admin/home',[admin::class,'adminside']);
Route::get('/Admin/login',[admin::class,'login']);
Route::post('/Admin/logintest',[admin::class,'logintest']);
Route::get('/Admin/logout',[admin::class,'logout']);
Route::get('/Admin/category',[admin::class,'category']);
Route::post('/Admin/addcategory',[admin::class,'addcategory']);
Route::get('/Admin/subcategory',[admin::class,'subcategory']);
Route::post('/Admin/addsubcategory',[admin::class,'addsubcategory']);
Route::get('/Admin/service',[admin::class,'service']);
Route::post('/Admin/addservice',[admin::class,'addservice']);
Route::get('/Admin/updatecategory/{id}',[admin::class,'updatecategory']);
Route::post('/Admin/updatedcat/{id}',[admin::class,'updatedcat']);
Route::get('/Admin/updatesubcategory/{id}',[admin::class,'updatesubcategory']);
Route::post('/Admin/updatedsubcategory/{id}',[admin::class,'updatedsubcategory']);
Route::get('/Admin/updateservice/{id}',[admin::class,'updateservice']);
Route::post('/Admin/updatedservice/{id}',[admin::class,'updatedservice']);
Route::get('/Admin/deletecategory/{id}',[admin::class,'deletecategory']);
Route::get('/Admin/deletesubcategory/{id}',[admin::class,'deletesubcategory']);
Route::get('/Admin/deleteservice/{id}',[admin::class,'deleteservice']);
Route::get('/Admin/professional',[admin::class,'professional']);
Route::get('/Admin/approve/{id}',[admin::class,'approval']);
Route::get('/Admin/disapprove/{id}',[admin::class,'disapproval']);
Route::get('/Admin/deleteprof/{id}',[admin::class,'deleteprof']);
Route::get('/Admin/coupon',[admin::class,'coupon']);
Route::get('/Admin/couponcode/{code}',[admin::class,'couponcode']);
Route::post('/Admin/addcoupon',[admin::class,'addcoupon']);
Route::get('/Admin/updatecoupon/{id}',[admin::class,'updatecoupon']);
Route::post('/Admin/updating/{id}',[admin::class,'updatingcoupon']);
Route::get('/Admin/deletecoupon/{id}',[admin::class,'deletecoupon']);
Route::get('/Admin/booking',[admin::class,'booking']);
Route::get('/Admin/membership',[admin::class,'membership']);
Route::post('/Admin/addmembership',[admin::class,'addmembership']);




Route::get('/professional',[professionals::class,'login']);
Route::get('/professional/login',[professionals::class,'login']);
Route::post('/professional/logintest',[professionals::class,'logincheck']);
Route::get('/professional/home',[professionals::class,'professional']);
Route::get('/professional/logout',[professionals::class,'logout']);
Route::get('/professional/service',[professionals::class,'service']);
Route::post('/professional/addservice',[professionals::class,'addservice']);
Route::get('/professional/updateprof/{pfid}',[professionals::class,'prof']);
Route::post('/professional/updservice/{pfid}',[professionals::class,'updateprof']);
Route::get('/professional/deleteservice/{pfid}',[professionals::class,'deleteservice']);
Route::get('/professional/category/{id}',[professionals::class,'category']);
Route::get('/professional/order',[professionals::class,'order']);
