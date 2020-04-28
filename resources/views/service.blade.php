@extends('layouts.app')
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
        <form action="/fixing/create" method="post" enctype="multipart/form-data">
            @csrf
            <section class="fixDiv" style='margin-top:1rem;'>
                <div class="fix">
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" placeholder="Eg: Chuka, Adesola, Samson " name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" placeholder="Whatsapp number for easy and better reach" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" placeholder="Email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="ps4 ps4 problems">Select State</label>
                        <select name="description" class="description form-control">
                            <option selected="true" disabled="disabled">-- Where you at --</option>
                            @foreach ($states as $state)
                            <option class="state" value="{{$state}}">{{$state}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for='ps4 fault description'>Address</label><br>
                        <textarea class="additionalDescription form-control" rows='2' name="additionalDescription" placeholder="Address"></textarea>
                    </div>
                </div>
            </section>
        </form>

        <hr>

        <section>
            @foreach ($cart as $cartItem)
                <div class="review">
                    <div class="review-desc">
                        <p>{{$cartItem->name}}</p>
                        <p>{{Str::limit($cartItem->options['description'], 30,'...')}}</p>
                        {{-- <p>
                            <span>{{Str::limit($cartItem->options['additional_description'], 12, '...')}}</span>,
                            <span>{{Str::limit($cartItem->options['mark'], 12,'...')}}</span>
                        </p> --}}
                    </div>
                    <div>
                        <a class="editFix" href="#" data-toggle="modal" id="{{$cartItem->rowId}}">edit</a>
                        <a class="deleteFix text-danger" href="#" id="{{$cartItem->rowId}}" data-toggle="modal">delete</a>
                    </div>
                </div>
            @endforeach

            <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                <div class="" style="margin-bottom:40px;">
                <div class="">
                    <input type="hidden" name="email" value="otemuyiwa@gmail.com"> {{-- required --}}
                    <input type="hidden" name="orderID" value="345">
                    <input type="hidden" name="amount" value="{{$servicePrice}}"> {{-- required in kobo --}}
                    <input type="hidden" name="quantity" value="3">
                    <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
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
            <div class="insure">
                <p>Not sure about something?
                    <li><a href="tel:+2349034833670">+234 903 483 3670</a></li>
                    <li><a href="tel:+2347057684942">+234 705 768 4942</a></li>
                </p>
            </div>
        </section>

    </div>
</div>
    @include('includes.editmodal')
    @include('includes.deletemodal')

@endsection
