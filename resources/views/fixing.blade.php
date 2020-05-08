@extends('layouts.app')
@include('meta::manager', [
    'title'         => "Fixing PS4 pads and consoles - PSGUY",
    'description'   => 'We are honored to help gamers save money on controllers',
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
        <h4 class="text-center">Fixing</h4>
        <p class="text-success text-center" id="success">G, It's done successfully</p>
        <p class="text-danger text-center" id="warning">G, we need the complete info</p>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <section class="fixDiv" style='margin-top:1rem;'>
                <div class="fix">
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input type="radio" required name="name" class="name form-check-input" id="pad" value="Ps4 Pad"><label class="form-check-label" for="ps4 pad">Ps4 Pad</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="radio" required name="name" id="console" class="name form-check-input" value="Ps4 Console"><label class="form-check-label" for="ps4 console">Ps4 Console</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ps4 ps4 problems">Select problem</label>
                        <select name="description" class="description form-control">
                            <option selected="true" disabled="disabled">-- wetin de occur --</option>
                            @foreach ($padProblems as $padProblem)
                            <option class="padProblems" value="{{$padProblem}}">{{$padProblem}}</option>
                            @endforeach
                            @foreach ($consoleProblems as $consoleProblem)
                            <option class="consoleProblems" value="{{$consoleProblem}}">{{$consoleProblem}}</option>
                            @endforeach
                            <option value="">None of the above</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for='ps4 fault description'>Additional Description (Optional)</label><br>
                        <textarea class="additionalDescription form-control" rows='4' name="additionalDescription" placeholder="If your problem wasn't in the list above, you can write it here. Or additional problems to what you already selected."></textarea>
                    </div>

                    <div class="form-group">
                        <label for='ps4 pad mark'>Mark (Optional)</label>
                        <textarea class="marker form-control" name="mark" rows='4' required placeholder="If you are fixing more than one pad or console, please identify each with a mark and tell me here."></textarea>
                    </div>
                    <p class="text-center"><button class="btn btn-primary fixButton">Save Request</button></p>
                </div>
                <hr>

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
                <p class="text-center">
                    <a href="/checkout" class="btn btn-success">Proceed to checkout (₦{{$servicePrice/100}})</a><br>
                    <button type="button" class="btn btn-link text-primary" data-toggle="modal" data-target="#pricingModal">
                        see pricing
                    </button>
                </p>
            </section>

        </form>

        <div class="insure">
            <p>Not sure about something?
                 <li><a href="tel:+2349034833670">+234 903 483 3670</a></li>
                <li><a href="tel:+2347057684942">+234 705 768 4942</a></li>
            </p>
        </div>
    </div>
</div>


@include('includes.editmodal')
@include('includes.deletemodal')
@endsection


