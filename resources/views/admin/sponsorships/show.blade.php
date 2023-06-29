@extends('layouts.admin')
@section('content')
<?php   $apartment_id = Session::get('apartment_id'); 
        $sponsorship_id = Session::get('sponsorship_id');?>


    {{-- <div class="container-payment-empty">

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

    </div> --}}


    <div class="col-6 mx-auto">
        {{-- Form di pagamento --}}
        <form method="post" id="payment-form" action="{{route('admin.sponsorships.checkouts')}}">
            @csrf
            
            <section>

                <input type="hidden" name="apartment_id" value="{{ $apartment_id }}">
                <input type="hidden" name="sponsorship_id" value="{{ $sponsorship_id }}">
                
                    <div class="card">
                        <div class="card-header">
                            Riepilogo Ordine
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="fw-bold small mb-3">Piano di Sponsorship</label>
                                    <h5 class="font-secondary fw-bold text-muted">Sponsorship name <span class="fw-secondary">(Sponsorship Duration h)</span></h5>
                                </div>
                                <div class="col">
                                    <label for="amount" class="mb-3 small fw-bold">
                                        Prezzo
                                    </label>
                                    <div class="input-wrapper amount-wrapper">
                                        <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="12">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

               
     

                {{-- Render dell'interfaccia di pagamento Drop-In --}}
                <div class="bt-drop-in-wrapper mt-5">
                    <div id="bt-dropin"></div>
                </div>
            </section>

            <input id="nonce" name="payment_method_nonce" type="hidden" />
            <div class="btn-pay text-center">
                <button type="submit" class="btn ms-btn ms-btn-primary">
                    <i class="fa-solid fa-credit-card me-2"></i>
                    Paga Ora</button>
            </div>
        </form>
        {{-- Fine form di pagamento --}}
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
