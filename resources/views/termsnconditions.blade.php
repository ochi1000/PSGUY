@extends('layouts.app')
@include('meta::manager', [
    'title'         => "Terms and Privacy Policy - PSGUY",
    'description'   => 'Our Terms and Conditions, and Privacy Policies',
])
@section('content')

    <div class="" style=" height:80vh; padding-top:1rem;">
        <div class="container text-justify">
            <h2>Terms and Conditions, Privacy Policy</h2>
            <br><br>
            <div class="text-center">
                <p>Our Lawyer is not done with our legal documents, so we are doing buisness as we wait.</p>
                <p>Thank you for checking!!</p>
            </div>
        </div>
    </div>

    @include('includes.footer')

@endsection

