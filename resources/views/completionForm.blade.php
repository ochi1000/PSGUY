@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="user-reg">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Name">
                <input type="tel" name="phone" placeholder="Phone Number">
                <input type="email" name="email" placeholder="Email">
                <select name="state" id="state">
                    <option default>Where you at</option>
                    @foreach ($states as $state)
                    <option value="{{$state}}">{{$state}}</option>
                    @endforeach
                </select>
                <input type="text" class="no-display" id="address" name="address" placeholder="Your Address">
            </form>

            <div class="container">
                @foreach ($cart as $cartItem)
                    <div>
                        <p>{{$cartItem->name}}</p>
                        <p>{{$cartItem->options['description']}}</p>
                        <p>{{$cartItem->options['mark']}}</p>
                    </div>
                <a class="editFix" href="#" data-toggle="modal" id="{{$cartItem->rowId}}">Edit</a>
                <a class="deleteFix" href="#" id="{{$cartItem->rowId}}" data-toggle="modal">Delete</a>
                @endforeach
            </div>

            <br>
            <br>
            <hr>

            <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                <div class="row" style="margin-bottom:40px;">
                  <div class="col-md-8 col-md-offset-2">
                    <p>
                        <div>
                            Lagos Eyo Print Tee Shirt
                            ₦ 2,950
                        </div>
                    </p>
                    <input type="hidden" name="email" value="otemuyiwa@gmail.com"> {{-- required --}}
                    <input type="hidden" name="orderID" value="345">
                    <input type="hidden" name="amount" value="800"> {{-- required in kobo --}}
                    <input type="hidden" name="quantity" value="3">
                    <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                    <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                    {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                     <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}


                    <p>
                      <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                      <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                      </button>
                    </p>
                  </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade editFixModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="editFixForm">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit PS4 fixing request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                        <input type="text" name="rowId" id="rowId">
                        </div>
                        <div class="form-group">
                        <label for="message-text" class="col-form-label">Description</label>
                        <textarea name="description" class="form-control edit-description" ></textarea>
                        </div>
                        <div class="form-group">
                        <label for="message-text" class="col-form-label">Mark</label>
                        <textarea name="mark" class="form-control edit-marker" ></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success updateButton">Edit Request</button>
                    </div>
                </form>
              </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div class="modal fade deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="deleteForm">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete PS4 fixing request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                        <input type="text" name="rowId" id="rowId">
                        </div>
                        <div class="form-group">
                        <p>Are you sure, you want to make this <span class="text-damger">MOVE</span>?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success deleteButton">Delete</button>
                    </div>
                </form>
              </div>
        </div>
    </div>

@endsection
