@extends('layouts.app')

@section('content')

    <div class="" style="height:100vh; padding-top:7rem; background-color:aliceblue;">
        <div class="container text-center">
            <h2>Thank you!!</h2>
            <h4>We'll contact you in a bit</h4>
            <a href="/">Return home</a>
            <p>{{$paymentDetails}}</p>
        </div>
    </div>
@endsection

