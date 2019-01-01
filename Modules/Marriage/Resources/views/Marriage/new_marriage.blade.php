@extends('marriage::layouts.master')

@section('page-title')
{{'Marriage Registration Page'}}
@endsection

@section('page-content')
<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			<form id="wizard-vertical" action="marriage/register" method="POST">
				@csrf
				<h3>Husband Info</h3>
				<section>
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="husband_first_name">Husband First Name</label>
						<div class="col-lg-8">
							<input placeholder="Husband First Name" class="form-control required" id="userName1" name="husband_first_name" type="text" value="{{old('husband_first_name')}}">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="husband_last_name">Husband Last Name</label>
						<div class="col-lg-8">
							<input value="{{old('husband_last_name')}}" placeholder="Husband Last Name"  id="husband_last_name" name="husband_last_name" type="text" class="required form-control">
						</div>
					</div>
				</section>
				<h3>Wife Info</h3>
				<section>
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="wife_first_name">Wife First Name</label>
						<div class="col-lg-8">
							<input placeholder="Wife First Name" class="form-control required" id="wife_first_name" name="wife_first_name" type="text">
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
							<select name="status" class="form-control" value="{{old('status')}}" >
								<option>Wife Status</option>
								<option value="1">First Wife</option>
								<option value="2">Second Wife</option>
								<option value="3">Third Wife</option>
								<option value="4">Forth Wife</option>
							</select>
						</div>
					</div>
				</section>
				<h3>Marriage Info</h3>
				<section>
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="marriage_date">Date Of Marriage</label>
						<div class="col-lg-8">
							<input class="form-control required" id="marriage_date" name="marriage_date" type="date" value="{{old('marriage_date')}}" >
						</div>
					</div>
				</section>
				<h3>Address Info</h3>
				<section>
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="country">Country</label>
						<div class="col-lg-8">
							<input value="{{old('country')}}"  placeholder="Country" class="form-control required" id="country" name="country" type="text">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="state">State</label>
						<div class="col-lg-8">
							<input value="{{old('state')}}" placeholder="State"  class="form-control required" id="state" name="state" type="text">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="lga">Local Government</label>
						<div class="col-lg-8">
							<input value="{{old('lga')}}"  placeholder="Local Government" class="form-control required" id="lga" name="lga" type="text">
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
				<h3>Wife Family Info</h3>
				<section>
					<div class="widget widget-tabs widget-tabs-gray border-bottom-none">
                    <!-- Widget heading -->
                    <div class="widget-head">
                        <strong class="lead">Did the wife family account created ? </strong>
                        <button  class="active btn btn-primary"  href="#yes" data-toggle="tab">Yes</button>
                        <button class="btn btn-warning" value="" href="#no" data-toggle="tab">No</button>
                        <button class="btn btn-infor" value="" href="#why" data-toggle="tab">Why ?</button>
                    </div>
                    <!-- // Widget heading END -->
                    <div class="widget-body">
                        <div class="tab-content">
                            <!-- Tab content -->
                            <div class="tab-pane active" id="no">
                                <strong>We assume that you this wife's parent doesn't have family account if they have click <a  href="#yes" data-toggle="tab"><i></i>yes they have</a></li></strong>
                                <div class="form-group clearfix">
                                    <label class="col-lg-4 control-label " for="name">Wife Date Of Birth</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" value="{{ old('wife_date') }}" id="name" name="wife_date" type="date">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="why">
                                <strong>We want to establish connection between the wife family and husband family enable us to easely pass information from one family to another like invetation.  
                                </strong>
                            </div>
                            <div class="tab-pane" id="yes">
                                <div class="form-group clearfix">
                                    <label class="col-lg-4 control-label " for="wife_family">Family Title</label>
                                    <div class="col-lg-8">
                                        <input placeholder="Wife Family Title" class="form-control" value="{{ old('wife_family') }}" id="name" name="wife_family" type="text">
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-lg-4 control-label " for="sname">Wife E-mail address</label>
                                    <div class="col-lg-8">
                                        <input placeholder="Wife E-mail Address" class="form-control" value="{{ old('wife_email') }}" id="wife_email" name="wife_email" type="email">
                                    </div>
                                </div>
                            </div>
                        </div>
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
			<!-- End #wizard-vertical -->
		</div>
	</div>
</div><!-- End row -->


@endsection

@section('footer')
<script>
    const app = new Vue({
        el: '#family',
        data: {
            no: '',
            yes: '',
        },
        mounted() {
        
      },
    )};

</script>
@endsection