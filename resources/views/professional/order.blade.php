@extends('professional.profadmin')

@section('order')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i>Booking/Order Data </h3>
            <div class="row mb">
                <!-- page start-->
                <div class="content-panel">
                    <div class="adv-table">
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered responsive" id="restbl">
                            <thead class="responsive">
                            <tr>
                                <th class="all">No</th>
                                <th class="all">Appointment_Date</th>
                                <th class="all">Appointment_Time</th>
                                <th class="all">Booking_Status</th>
                                <th class="all">Booking_Date</th>
                                <th class="all">Address</th>
                                <th class="all">Action</th>
                                {{--<th class="hidden-phone">Platform(s)</th>--}}
                                {{--<th class="hidden-phone">Engine version</th>--}}
                                {{--<th class="hidden-phone">CSS grade</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach($address as $val)
                                @php
                                    $add=$val->address;
                                @endphp
                            @endforeach
                            @foreach($book as $val)
                                <tr class="gradeX">
                                    <td>{{$i++}}</td>
                                    <td>{{$val->apt_date}}</td>
                                    <td>{{$val->apt_time}}</td>
                                    {{--<td>{{($val->booking_status==0)}}</td>--}}
                                    <td>@if($val->booking_status==1)
                                            {{'Placed'}}
                                        @elseif($val->booking_status==2)
                                            {{'Confirm'}}
                                        @elseif($val->booking_status==3)
                                            {{'Completed'}}
                                        @endif
                                    </td>
                                    <td>{{$val->booking_date}}</td>
                                    <td>{{$add}}</td>
                                    <td>
                                        @if($val->booking_status==1)
                                            {{--<span style="color:green;"><b>{{'Order Has Been Placed'}}</b></span>--}}
                                            <a href="#"><button id="assignprof" class="btn btn-success btn-xs"><i class="fa fa-check">Confirm</i></button></a>
                                        @else
                                            <a href="#"><button class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection

@section('script')

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#restbl').DataTable();
        } );
    </script>
@endsection