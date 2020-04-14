@extends('layouts.app')

@section('content')
    <section>
        <div class="row">
                <div class=" col-md-6 ">
                    @include('includes.alerts')
                </div>
        </div>
    </section>
    <div class="container">
        Fixing
        <form action="/fixing/create" method="post" enctype="multipart/form-data">
            @csrf
            <section class="fixDiv">
                <div class="fix">
                    <p>
                        <fieldset>
                        <input type="radio" required name="name" class="name" value="Ps4 Pad"><label for="ps4 pad">Ps4 Pad</label>
                        <input type="radio" required name="name" class="name" value="Ps4 Console"><label for="ps4 console">Ps4 Console</label>
                        </fieldset>
                    </p>

                    <label for='ps4 fault description'>Fault Description</label><br>
                    <textarea class="description" name="description" required placeholder="what is the problem or fault happening"  oninvalid="this.setCustomValidity('This is the main part of this form, and you de leave am empty')"oninput="this.setCustomValidity('')"></textarea>
                    <br>
                    <fieldset>
                        <label for='ps4 pad mark'>Mark (Optional)</label><br>
                        <textarea class="marker" name="mark" required placeholder="If you are fixing more than one pad or console, please identify each with a mark and tell me" oninvalid="this.setCustomValidity('This is the main part of this form, and you de leave am empty')" oninput="this.setCustomValidity('')"></textarea>
                    </fieldset>
                    <button class="btn btn-success fixButton">Send Request</button>
                </div>
            </section>
            <button class="btn btn-primary addFixDiv">Make another fix</button>
            <br>
            <a href="/service" class="btn btn-success" type="submit">Continue </a>
        </form>

@endsection


