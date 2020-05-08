@extends('layouts.app')
@include('meta::manager', [
    'title'         => "About us - PSGUY",
    'description'   => 'About us, our mission in the gaming industry.',
])
@section('content')

    <div class="" style="padding-top:1rem;">
        <div class="container text-justify">
            <h2>About Us</h2>
            <br>
            <div>
                <p>PSGUY puts video games where they belong—in the hands of gamers who love 'em. The PSGUY website makes it easier than ever to get the most out of gaming, by getting your pads and consoles in good ﬁt always, giving back to the gaming community with monthly paid tournaments(free to join) and more coming.</p>
                <br><br>
                <h3>Mission</h3>
                <p>To provide the most cost effective and convenient way to play a wide range of console games.</p><br>
                <h4>Founder</h4>
                <p>Ochi Jideofor, CEO </p>
                <br>
                <h4>Headquarters</h4>
                <p>Enugu, Nigeria</p>
                <br>
                <h4>Founded</h4>
                <p>Feburary 2020 with oﬃcial launch in May 2020</p>
                <br>
                <h4>Contact</h4>
                <p>PSGUY Investor Relations and Collaborations</p>
                <p><a href="mailto:founder@psguy.com.ng">founder@psguy.com.ng</a></p>
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection

