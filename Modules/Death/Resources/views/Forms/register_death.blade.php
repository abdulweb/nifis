<form id="wizard-vertical" action="death/register" method="POST">
	@csrf
	<h3>Chose Family</h3>
	<section>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_first_name">First Name</label>
			<div class="col-lg-8">
				<select name="family" class="form-control">
					<option value="">First Name</option>
					@if($names)
						@foreach($names as $name)
	                        <option value="{{$name['user_id']}}">{{$name['first_name']}}</option>
						@endforeach
					@endif
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_last_name">Last Name</label>
			<div class="col-lg-8">
				<select name="status" class="form-control">
					<option value="">Last name</option>
					@if($names)
						@foreach($names as $name)
	                        <option value="{{$name['user_id']}}">{{$name['last_name']}}</option>
						@endforeach
					@endif
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_last_name"></label>
			<div class="col-lg-8">
				<input type="submit" value="Chosen" class="btn btn-primary btn-block">
			</div>
		</div>
		
	</section>
</form>
