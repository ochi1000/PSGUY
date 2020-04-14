@extends('layouts.app')

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
    <div class="pad-img-div">
        <img class="" src="/game-images/ps4pad.png">
    </div>
</div>
<section class="container bg-white mw-100 after-image text-center">
    <div class="mt-4">
        <h3>Fix your PS4 pads for almost nothing</h3>
        <div>
            <img style="width:100px;" src="/game-images/ps4pad3.png">
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat est velit egestas dui id ornare arcu odio.<span class="text-highlight"><a href="http://">condimentum lacinia quis vel.</a></span>
        </p>
        <a href="http://" class="btn">Fix Pad Now</a>
    </div>
    <hr>
    <div class="mt-4">
        <h3>Fix your PS4 consoles</h3>
        <div>
            <img style="width:150px;" src="/game-images/ps4console3edit.png">
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat est velit egestas dui id ornare arcu odio.<span class="text-highlight"><a href="http://">condimentum lacinia quis vel.</a></span>
        </p>
        <a href="http://" class="btn">Fix Console Now</a>

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
            <p>e-Tournament starts 27th</p>
            <p>our customers get early access for registration</p>
            <p class="whatsapp-text">Join our exclusive chat room for your comments and opinion on the tournaments <br><a href="/"><i class="fab fa-whatsapp"></i></a></p>
            <p>20k to be won</p>
        </div>
    </div>
    @include('includes.footer')
</section>
@endsection
