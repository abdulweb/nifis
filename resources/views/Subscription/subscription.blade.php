
@extends('layouts.app')

@section('content')
 <a href="{{route('home')}}">Home</a><br>


<form action="{{route('subscribe')}}" method="POST">
	@csrf
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_bkUTURXB6KsbYFzziVrLbQ3W"
    data-amount="300000"
    data-name="School Fee"
    data-description="iUOL"
    data-label="Pay Now With Card"
    data-allow-remember-me="true"
    data-email="isahlabbo22@gmail.com"
    data-shipping-address="true"
    data-zip-code="true"
    data-currency="ngn"
    data-panel-label="Pay Now"
    data-billing-address="true"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto">
  </script>
</form>

@stop

@section('scripts')
<script>

//preventing the popup blocking

document.getElementById("button").addEventListener("click", function() {
  handler.open({
    image: '/square-image.png',
    name: 'Demo Site',
    description: '2 widgets',
    amount: 2000
  });
});

</script>

@endsection
