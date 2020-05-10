@extends('layouts.app')
@include('meta::manager', [
    'title'         => "Checkout - PSGUY",
    'description'   => 'Pay, then we can start working.',
])
@section('content')
<div class="temp">
    <section>
        <div class="row">
                <div class=" col-md-6 ">
                    @include('includes.alerts')
                </div>
        </div>
    </section>
    <div class="container fixing">
        <h4 class="text-center">Checkout</h4>
        <p class="text-success text-center" id="success">G, we need the complete info</p>
        <p class="text-danger text-center" id="warning">G, we need the complete info</p>
        @if (auth()->user())
        <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
            @csrf
            <section class="fixDiv" style='margin-top:1rem;'>
                <div class="fix">
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" placeholder="Eg: Chuka, Adesola, Samson " name="name" class="name form-control" value="{{auth()->user()->name}}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" placeholder="Whatsapp number for easier and better reach, tournaments too" value="{{auth()->user()->phone}}" name="phone" class="form-control phone">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" placeholder="Email" value="{{auth()->user()->email}}" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="ps4 ps4 problems">Select State</label>
                        <select name="state" class="state form-control">
                            <option selected="true" value="{{auth()->user()->state}}">{{auth()->user()->state}}</option>
                            @foreach ($states as $state)
                            <option class="state" value="{{$state}}">{{$state}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for='ps4 fault description'>Address</label><br>
                        <textarea class="address form-control" rows='2' name="address" placeholder="Address">{{auth()->user()->address}}</textarea>
                    </div>

                    <p class="text-center"><button class="btn btn-primary save">Save</button></p>
                </div>
            </section>
        {{-- </form> --}}

        <hr>

        <section>
            @foreach ($cart as $cartItem)
                <div class="review">
                    <div class="review-desc">
                        <p>{{$cartItem->name}}</p>
                        <p>{{Str::limit($cartItem->options['description'], 30,'...')}}</p>
                    </div>
                    <div>
                        <div>
                            <a class="deleteFix text-danger" data-toggle="modal"><i class="fa fa-times" id="{{$cartItem->rowId}}" aria-hidden="true" aria-label="delete"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form"> --}}

                <div class="" style="margin-bottom:40px;">
                <div class="">
                    {{-- <input type="hidden" name="email" value="{{auth()->user()->email}}"> required --}}
                    <input type="hidden" name="orderID" value="345">
                    <input type="hidden" name="amount" value="{{$servicePrice}}"> {{-- required in kobo --}}
                    <input type="hidden" name="quantity" value="3">
                    <input type="hidden" name="metadata" value="{{ json_encode($array = ['key' => 'value']) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                    <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                    {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}
                    <br>
                    <p class="text-center">
                    <button class="btn btn-success " type="submit" value="Pay Now!">
                        Pay Now! (₦{{$servicePrice/100}})
                    </button>
                    </p>
                </div>
                </div>
            </form>
            @endif
            <div class="insure">
                <p>Not sure about something?
                    <li><a href="tel:+2349034833670">+234 903 483 3670</a> (Always available)</li>
                    <li><a href="tel:+2347057684942">+234 705 768 4942</a> (Always available)</li>
                </p>
            </div>
        </section>

    </div>
</div>
    @include('includes.editmodal')
    @include('includes.deletemodal')

@endsection
