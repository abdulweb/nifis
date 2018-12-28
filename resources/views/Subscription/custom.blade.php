
@extends('layouts.app')

@section('content')
 <button id="customButton">Purchase</button>
@stop

@section('scripts')

<script src="https://checkout.stripe.com/checkout.js"></script>

<script>
var handler = StripeCheckout.configure({
  key: 'pk_test_bkUTURXB6KsbYFzziVrLbQ3W',
  image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
  locale: 'auto',
  token: function(token) {

    // You can access the token ID with `token.id`.
    // Get the token ID to your server-side code for use.
  }
  source: function(source) {

  }
});

document.getElementById('customButton').addEventListener('click', function(e) {
  // Open Checkout with further options:
  handler.open({
    name: 'Web development',
    description: '2 widgets',
    amount: 2000,
    billingAddress: 'true',
  });
  e.preventDefault();
});

// Close Checkout on page navigation:
window.addEventListener('popstate', function() {
  handler.close();
});
</script>

@endsection
