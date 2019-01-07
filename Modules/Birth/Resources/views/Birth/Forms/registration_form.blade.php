
<form id="wizard-vertical" action="birth/register" method="POST">
	@csrf
	<h3>Father Info</h3>
	<section>
		<input type="hidden" name="user_id" value="{{$husbands['user_id']}}">
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_first_name">Husband First Name</label>
			<div class="col-lg-8">
				<input value="{{$husbands['name']}}" placeholder="Husband First Name" class="form-control required" id="userName1" name="husband_first_name" type="text" value="{{old('husband_first_name')}}" disabled>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_last_name">Husband Last Name</label>
			<div class="col-lg-8">
				<input value="{{$husbands['surname']}}" value="{{old('husband_last_name')}}" placeholder="Husband Last Name"  id="husband_last_name" name="husband_last_name" type="text" class="required form-control" disabled>
			</div>
		</div>
		
	</section>
	<h3>Mother Info</h3>
	<section>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="wife_first_name">Wife First Name</label>
			<div class="col-lg-8">
				<input value="{{old('wife_first_name')}}" placeholder="Wife First Name" class="form-control required" id="wife_first_name" name="wife_first_name" type="text">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label" for="wife_last_name">Wife last Name</label>
			<div class="col-lg-8">
				<input value="{{old('wife_first_name')}}" placeholder="Wife Last Name"  class="form-control required" id="wife_last_name" name="wife_last_name" type="text">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="userName1">Wife Status</label>
			<div class="col-lg-8">
				<select name="wife_status" class="form-control" value="{{old('wife_status')}}" >
					<option value="">Wife Status</option>
					<option value="1">First Wife</option>
					<option value="2">Second Wife</option>
					<option value="3">Third Wife</option>
					<option value="4">Forth Wife</option>
				</select>
			</div>
		</div>
	</section>
	<h3>Child Info</h3>
	<section>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="marriage_date">Date Of Marriage</label>
			<div class="col-lg-8">
				<input class="form-control required" id="marriage_date" name="marriage_date" type="date" value="{{old('marriage_date')}}" >
			</div>
		</div>
	</section>
	<h3>Birth Info</h3>
	<section>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="country">Country</label>
			<div class="col-lg-8">
				<input value="{{$family->location->lga->state->country->name}}"  placeholder="Country" class="form-control required" id="country" name="country" type="text" disabled>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="state">State</label>
			<div class="col-lg-8">
				<input value="{{$family->location->lga->state->name}}" placeholder="State"  class="form-control required" id="state" name="state" type="text" disabled>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="lga">Local Government</label>
			<div class="col-lg-8">
				<input value="{{$family->location->lga->name}}"  placeholder="Local Government" class="form-control required" id="lga" name="lga" type="text" disabled>
			</div>
		</div>
        <div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="town">Town/Village</label>
			<div class="col-lg-8">
				<input value="{{old('town')}}"  placeholder="Town/Village" class="form-control required" id="town" name="town" type="text">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="area">Area</label>
			<div class="col-lg-8">
				<input value="{{old('area')}}"  placeholder="Living Area"  class="form-control required" id="area" name="area" type="text">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="house_no">House No</label>
			<div class="col-lg-8">
				<input value="{{old('house_no')}}"  placeholder="House No" class="form-control required" id="house_no" name="house_no" type="text">
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="house_desc">Description</label>
			<div class="col-lg-8">
				<input value="{{old('house_desc')}}"  placeholder="House Description" class="form-control required" id="house_desc" name="house_desc" type="text">
			</div>
		</div>
	</section>
	
	<h3>Be Notify</h3>
	<section>
		<div class="form-group clearfix">
			<div class="col-lg-12">
				<div class="checkbox checkbox-primary">
					<input id="checkbox-v" type="checkbox">
					<label for="checkbox-v"> I agree with the Terms and Conditions. </label>
					<input type="submit" value="Register" class="btn btn-primary">
				</div>
			</div>
		</div>
	</section>
</form>
