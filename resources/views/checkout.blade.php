{{--@extends('master')--}}
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial;
            font-size: 17px;
            padding: 8px;
        }

        * {
            box-sizing: border-box;
        }

        .row {
            display: -ms-flexbox; /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap; /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-25 {
            -ms-flex: 25%; /* IE10 */
            flex: 25%;
        }

        .col-50 {
            -ms-flex: 50%; /* IE10 */
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%; /* IE10 */
            flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }

        .container {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }

        .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        a {
            color: #2196F3;
        }

        hr {
            border: 1px solid lightgrey;
        }

        span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }
            .col-25 {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

<h2>Urban Clap Checkout Details</h2>
{{--<p>Resize the browser window to see the effect. When the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other.</p>--}}
<div class="row">
    <div class="col-75">
        <div class="container">
            <form action="/action_page.php" method="post">
                <div class="row">
                    <div class="col-50">
                        <h3>Booking Details</h3>
                        {{--@foreach($user as $val)--}}
                        <input type="hidden" value="{{csrf_token()}}" id="token">
                        <label for="apt_date"><i class="fa fa-user"></i> Appointment Date</label><br>
                        <input type="date" id="apt_date" name="apt_date" placeholder="" value=""><br><br>
                        <label for="apt_time"><i class="fa fa-envelope"></i> Appointment Time</label><br>
                        <input type="time" id="apt_time" name="apt_time" placeholder="" value=""><br><br>
                        {{--@endforeach--}}
                    </div>
                    <div class="col-50">
                        {{--<div class="col-25">--}}
                        <div class="container">
                            @php
                                $c=0;
                                $total=0;
                                $uid=session()->get('user.u_id');
                            @endphp
                            @foreach($cart as $val)
                                @php
                                    $c++;
                                @endphp
                            @endforeach
                            <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>{{$c}}</b></span></h4>
                            @foreach($cart as $key=>$val)
                                @php
                                    $total+=$val['price'];
                                @endphp
                                <p><span>{{$val['sname']}}</span> <span class="price">{{$val['price']}}</span></p>
                            @endforeach
                            <hr>
                            @if(session()->has('coupon'))
                                @php
                                    $d=session()->get('coupon.discount_amt');
                                @endphp
                            @else
                                @php
                                $d='0';
                                @endphp
                            @endif
                            <p>Total <span class="price" style="color:black"><b>{{$total}}</b></span></p>
                            <p>Discount <span class="price" style="color:black"><b>{{$d}}</b></span></p>
                            <p>Payable Amount <span class="price" style="color:black"><b>{{$total-$d}}</b></span></p>
                            <input type="hidden" id="totalamt" name="totalamt" value="{{$total-$d}}">

                        </div>
                    </div>
                </div>
                    <label>
                            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                    </label>
                    <button type="button" id="payment" class="btn">Proceed to Checkout</button>
                    {{--<a href="/checkout"><input id="payment" type="submit" value="Continue to checkout" class="btn"></a>--}}
                {{--</div>--}}
            </form>
        </div>
    </div>
</div>

 {{--Script of Payment--}}
<script src="{{asset('assets')}}/lib/jquery/dist/jquery.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var apt_date;
    var apt_time;
    var booking_date;
    var total;
    var token=$('#token').val();
    var amount=$('#totalamt').val();
    //    var pf_u_id=$('#pf_u_id').val();
    var finalprice=amount*100; //convert Paisa to Rupee
    var options = {
        "key": "rzp_test_B73PALVfr4NoOM", // Enter the Key ID generated from the Dashboard
        "amount": finalprice, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "currency": "INR",
        "name": "Urban Clap",
        "description": "Make Payment",
        "image": "https://example.com/your_logo",
        "order_id": "", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
        "handler": function (response){
            alert(response.razorpay_payment_id)
            {{--            window.location="{{url('home')}}";--}}
            $.ajax({
                url:"{{url('payment')}}",
                method:'POST',
                data:{_token:token,payment_id:response.razorpay_payment_id,amount:amount,apt_date:apt_date,apt_time:apt_time,total:total},
                success:function(result){
                    console.log(result)
                }
            });
        },
        "prefill": {
            "name": "N K Chauhan",
            "email": "urbanclap@gmail.com",
            "contact": "9978870729"
        },
        "notes": {
            "address": "Razorpay Corporate Office"
        },
        "theme": {
            "color": "#3399cc"
        }
    };
    var pay = new Razorpay(options);
    pay.on('payment.failed', function (response){
        alert('Payment Failed');
    });
    $('#payment').click(function(){
        apt_date=$('#apt_date').val();
        apt_time=$('#apt_time').val();
        total=$('#totalamt').val();
        pay.open();
    });
</script>

</body>
</html>

