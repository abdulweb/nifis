
@extends('layouts.app')

@section('content')
 <a href="{{route('home')}}">Home</a><br>
 <div class="stripe-error alert alert-danger hidden"></div>
<form action="{{route('subscribe')}}" method="post" id="subscription">
	@csrf
	<div class="row">
	<div class="col-md-6">
		<label> Chosen Plan:</label>
		<select name="plan" class="form-control">
			<option value="">chose plan</option>
			<option value="sms">Sms Message (#200/month)</option>
			<option value="email">E-mail Message (#120/month)</option>
			<option value="slack">Slack Message (#150/month)</option>
		</select>

	</div>
	<div class="col-md-6">
		<div class="row">
			<div class="col-lg-12">
				<label>
					Account Number
					<input type="text" data-stripe="number" class="form-control" />
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<label>
					Expiry Month
					<input type="text" data-stripe="exp-month" class="form-control" />
				</label>
			</div>
			<div class="col-lg-4">
				<label>
					Expiry Year
					<input type="text" data-stripe="exp-year" class="form-control" />
				</label>
			</div>
			<div class="col-lg-4">
				<label>
					CVC
					<input type="text" data-stripe="cvc" class="form-control">
				</label>
			</div>
		</div>
		<button class="btn btn-primary">Make Payment</button>
	</div>
</div>
</form>
@stop

@section('scripts')
$document.ready(function(){
    Stripe.setPublishableKey('pk_test_bkUTURXB6KsbYFzziVrLbQ3W');
    $('#subscription button').on(click, function(){
        var form = $('#subscription');
        var submit = form.find('button');
        var submitInitialText submit.text();

        submit.attr('disable', 'disabled').text('just one momentd...');

        Stripe.card.createToken(form, function(status, response){
            var token;

            if(response.error){
                form.find('.stripe-error').text(response.error.message).show();
            }else{
            token = response.id;
            form.append($('<input type="hidden" name="token">').val(token ));
            form.submit();
        }
        });
    });
});
@endsection
