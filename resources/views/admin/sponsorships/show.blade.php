@extends('layouts.admin')
@section('content')
<?php   $apartment_id = Session::get('apartment_id'); 
        $sponsorship_id = Session::get('sponsorship_id');?>
    <div class="container-payment-empty">

    </div>
    <div class="container-payment-maxwidth">
        <div class="container-payment-form">

            <form method="post" id="payment-form" action="{{ route('admin.sponsorships.checkouts') }}">
                @csrf
                <section>
                    
                    <input type="hidden" name="apartment_id" value="{{ $apartment_id }}">
                    <input type="hidden" name="sponsorship_id" value="{{ $sponsorship_id }}">
                    <label for="amount">
                        <span class="input-label">Amount</span>
                        <div class="input-wrapper amount-wrapper">
                            <input id="amount" name="amount" type="tel" min="1" placeholder="Amount"
                                value="{{$amount}}">
                        </div>
                    </label>


                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
                </section>

                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <button class="button" type="submit"><span>Test Transaction</span></button>
            </form>

        </div>

    </div>
    <script src="https://js.braintreegateway.com/web/dropin/1.38.1/js/dropin.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $token }}";

        braintree.dropin.create({
            authorization: client_token,
            selector: '#bt-dropin',
            paypal: {
                flow: 'vault'
            }
        }, function(createErr, instance) {
            if (createErr) {
                console.log('Create Error', createErr);
                return;
            }
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                instance.requestPaymentMethod(function(err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }

                    // Add the nonce to the form and submit
                    document.querySelector('#nonce').value = payload.nonce;
                    form.submit();
                });
            });
        });
    </script>
@endsection
