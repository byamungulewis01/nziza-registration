@extends('layout')
@section('conversion')
@endsection
@php
use Carbon\Carbon;
@endphp
@section('content')
    <section id="landingContact" class="section-py">
        <div class="container">
            <div class="text-center mt-5 mb-3 pb-1">
                <span class="badge bg-label-primary fs-1"> Thank you for Registering</span>
            </div>
            <p class="text-center">
                Welcome to the {{ $training->software }} {{ $training->name }} Training! <br>
                <strong> Your registration is confirmed!</strong>
            </p>
            <div style="margin-top: -20px;" class="text-center mt-0">
                <h5 class="text-center mt-0">What's Next?</h5>
                <p>
                    To help you prepare, <a target="_blank"
                        href="{{ $training->curriculum }}">Click
                        here to download the training curriculum.</a> <br>
                    Please ensure to deposit your payment before <strong>{{ Carbon::parse($training->start_date)->subWeeks(1)->format('F d, Y') }}.</strong>, to avoid losing your
                    seat.
                    <br>
                </p>
                Stay Connected! <a target="_blank" href="{{ $training->whatsapp_group }}">Click here to
                    Join our WhatsApp Group</a>

            </div>
            <h5 class="text-center mt-3">Need Help?</h5>
            <div class="text-center mt-0">
                For questions, contact us at: <br>
                <strong>Email:</strong> info@nzizaglobal.co.tz <br>
                <strong>Phone:</strong> +255 752 303 123 <br><br>
                <strong>Thank you again! We can’t wait to see you there!</strong>


            </div>

        </div>
    </section>
@endsection
