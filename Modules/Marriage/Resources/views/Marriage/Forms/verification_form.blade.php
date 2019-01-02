<form id="wizard-vertical" action="marriage/verify" method="POST">
	@csrf
	<h3>Chose Family</h3>
	<section>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_first_name">Family title</label>
			<div class="col-lg-8">
				<select name="family" class="form-control">
					<option value="">family 1</option>
					<option value="">family 2</option>
					<option value="">family 3</option>
				</select>
			</div>
		</div>
		<div class="form-group clearfix">
			<label class="col-lg-4 control-label " for="husband_last_name">Who is to marry</label>
			<div class="col-lg-8">
				<select name="status" class="form-control">
					<option value="father">Father</option>
					<option value="son">Son</option>
					<option value="daughter">Doughter</option>
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
