@extends('layouts.app')
@include('meta::manager', [
    'title'         => "PSGUY - Fix Ps4 Controllers and join FIFA Torunaments",
    'description'   => 'Gamers fix their controllers and join our FIFA Torunaments free',
])
@section('content')
<section class="home-carousel">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100 img-fluid" src="/game-images/fifa20hedit.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 img-fluid" src="/game-images/ellie1.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 img-fluid" src="/game-images/godofwar.jpg" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 img-fluid" src="/game-images/ghost.jpeg" alt="Third slide">
          </div>
        </div>
      </div>
</section>
<div class="d-block w-100 pad-div">
    <div class="pad-img-div show-for-small-screen">
        <img class="" src="/game-images/ps4pad.png">
    </div>
</div>
<section class="container bg-white mw-100 after-image text-center">
    <div class="mt-4">
        <div class="show-for-small-screen">
            <h3>Fix your PS4 pads for almost nothing</h3>
            <div>
                <img style="width:100px;" src="/game-images/ps4pad3.png">
            </div>
            <p>You know new pads are cool😎 and not always cheap, but how long does it take before there is something up with the pad. Fixing your pad gives you the opportunity to save more and still get the quality and full functions of a new pad.
                <span class="text-highlight"><a class="ps4PadFix" href="#" data-toggle="modal">The full gist</a>
                </span>
            </p>
            <a href="/fixing" class="btn">Fix Pad Now</a>
        </div>
        <div class="show-for-big-screen row">
            <div class="col-6">
                <img src="/game-images/ps4pad3.png">
            </div>
            <div class="col-6 write-up">
                <h3>Fix your PS4 pads for almost nothing</h3>
                <p>You know new pads are cool and not always cheap, but how long does it take before there is something up with the pad. Fixing your pad gives you the opportunity to save more and still get the quality and full functions of a new pad.<span class="text-highlight"><a class="ps4PadFix" href="#" data-toggle="modal">The full gist</a>
                </span>
                </p>
                <a href="/fixing" class="btn">Fix Pad Now</a>
            </div>
        </div>
    </div>
    <hr class="show-for-small-screen">
    <div class="mt-4">
        <div class="show-for-small-screen">
            <h3>Fix your PS4 consoles</h3>
            <div>
                <img style="width:150px;" src="/game-images/ps4console3edit.png">
            </div>
            <p>There comes a time in your journey with your console that it begins to act up ( like most people in relationships....😪). Maybe it sounds like a jet engine about to takeoff, but still manages to start the game. It needs a ﬁx before it ﬁnally crashes and costs more to ﬁx.
                <span class="text-highlight"><a class="ps4ConsoleFix" href="#" data-toggle="modal">Real talk</a>
            </p>
            <a href="/fixing" class="btn">Fix Console Now</a>
        </div>

        <div class="show-for-big-screen row">
            <div class="col-6 write-up">
                <h3>Fix your PS4 consoles</h3>
                <p>There comes a time in your journey with your console that it begins to act up ( like most people in relationships....😪). Maybe it sounds like a jet engine about to takeoff, but still manages to start the game. It needs a ﬁx before it ﬁnally crashes and costs more to ﬁx.
                    <span class="text-highlight"><a class="ps4ConsoleFix" href="#" data-toggle="modal">Real talk</a>
                </p>
                <a href="/fixing" class="btn">Fix Console Now</a>
            </div>
            <div class="col-6">
                <img src="/game-images/ps4consoleedit.png">
            </div>
        </div>
    </div>

    <div class="testimony">
        <p>We work with most of the game shops around you</p>
    </div>

    <div class="tournament-div">
        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> --}}
        <div class="fifa-logo-div">
            <img src="/game-images/fifa-logo1.png" alt="ps4 fifa20 tournament">
        </div>
        <div>
            <p class="tournament-date">e-Tournament reg. starts 27th May</p>
            <p class="our-customers">our customers get early access for registration</p>
            <p class="whatsapp-text">Join our exclusive chat room for your comments and opinion on the tournaments <br><a href="https://chat.whatsapp.com/HMXKfwURwk01MqmydyGnv5"><i class="fab fa-whatsapp"></i></a></p>
            <p class="our-customers">20k to be won</p>
        </div>
    </div>
    @include('includes.footer')
</section>
@include('includes.ps4padfixmodal')
@include('includes.ps4consolefixmodal')
@endsection
