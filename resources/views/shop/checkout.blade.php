@extends('layouts.app')

@section('stripe')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2>Checkout</h2>
                <p>Votre total: {{ $total }} €</p>


                @foreach($cart->items as $item)
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-md-6">
                                <img class="card-img-top img-responsive" src="http://via.placeholder.com/300.png/09f/fff" alt="Card image cap">
                            </div>
                            <div class="col-md-6">
                                <p>Nom de l'article:{{ $item['item']->name }} </p>
                                <p>Prix de l'article: {{ $item['item']->price }}€</p>
                                <p>Nombre d'exemplaires: {{ $item['qty'] }}</p>
                            </div>

                        </div>
                @endforeach

                <form action="{{ route('proceed-checkout') }}" method="POST">
                    {{ csrf_field() }}
                        <div class="thumbnail">
                            <div class="caption">
                                <p>
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="{{ env('STRIPE_KEY') }}"
                                            data-amount="{{ $total * 100}}"
                                            data-name="Stripe.com"
                                            data-description="Widget"
                                            data-locale="auto"
                                            data-currency="eur">
                                    </script>
                                </p>
                            </div>
                        </div>
                </form>
                {{--<form action="{{ route('checkout') }}" method="post" id="checkout-form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Addresse</label>
                                <input type="text" id="address" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="card-name">Nom sur la carte: </label>
                                <input type="text" id="card-name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="card-number">Numéro de carte:</label>
                                <input type="text" id="card-number" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="card-expiry-month">Mois d'expiration</label>
                                <input type="text" id="card-expiry-month" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="card-expiry-year">Année d'expiration:</label>
                                <input type="text" id="card-expiry-year" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="card-cvc">CVC:</label>
                                <input type="text" id="card-cvc" class="form-control" required>
                            </div>
                        </div>


                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-success">Acheter</button>

                </form>--}}



                {{--<form action="{{ route('proceed-checkout') }}" method="post" id="payment-form">
                    <div class="form-row">
                        <label for="card-element">
                            Credit or debit card
                        </label>
                        <div id="card-element">
                            <!-- a Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display Element errors -->
                        <div id="card-errors" role="alert"></div>
                    </div>

                    <button>Submit Payment</button>
                </form>--}}

                {{--<form action="{{ route('proceed-checkout') }}" method="POST">
                    {{ csrf_field() }}
                    <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="pk_test_GM1LAa5BKK34xY41Irw2KqLc"
                            data-amount="{{ $total * 100 }}"
                            data-name="Vincent Bertrand"
                            data-description="Widget"
                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                            data-locale="auto"
                            data-zip-code="true"
                            data-currency="eur">
                    </script>
                </form>--}}
            </div>
        </div>
    </div>

    {{--<script type="text/javascript">
        var stripe = Stripe('pk_test_GM1LAa5BKK34xY41Irw2KqLc');
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        var style = {
            base: {
                // Add your base input styles here. For example:
                fontSize: '16px',
                lineHeight: '24px'
            }
        };

        // Create an instance of the card Element
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>
        card.mount('#card-element');

        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Create a token or display an error when the form is submitted.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server
                    console.log(result.token);
                    stripeTokenHandler(result.token);
                }
            });
        });

        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>--}}
@endsection

@section('scripts')
    {{--<script src="https://js.stripe.com/v2/"></script>
    <script src="{{ asset('js/checkout.js') }}"></script>--}}
@endsection

