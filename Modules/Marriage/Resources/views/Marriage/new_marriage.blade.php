@extends('marriage::layouts.master')

@section('page-title')
{{'Marriage Registration Page'}}
@endsection

@section('page-content')
<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			<form id="wizard-vertical" action="{{route('marriage.create')}}" method="POST">
				@csrf
				<h3>Husband Info</h3>
				<section>
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="husband_last_name">Husband First Name</label>
						<div class="col-lg-8">
							<input placeholder="Husband First Name" class="form-control required" id="userName1" name="husband_last_name" type="text">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="husband_last_name">Husband Last Name</label>
						<div class="col-lg-8">
							<input placeholder="Husband Last Name"  id="husband_last_name" name="husband_last_name" type="text" class="required form-control">
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
						<label class="col-lg-4 control-label " for="wife_last_name">Wife last Name</label>
						<div class="col-lg-8">
							<input placeholder="Wife Last Name"  class="form-control required" id="wife_last_name" name="wife_last_name" type="text">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="userName1">Wife Status</label>
						<div class="col-lg-8">
							<select name="w_status" class="form-control">
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
						<label class="col-lg-4 control-label " for="mdate">Date Of Marriage</label>
						<div class="col-lg-8">
							<input class="form-control required" id="mdate" name="mdate" type="date">
						</div>
					</div>
				</section>
				<h3>Address Info</h3>
				<section>
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="country">Country</label>
						<div class="col-lg-8">
							<input placeholder="Country" class="form-control required" id="country" name="country" type="text">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="state">State</label>
						<div class="col-lg-8">
							<input  placeholder="State"  class="form-control required" id="state" name="state" type="text">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="lga">Local Government</label>
						<div class="col-lg-8">
							<input  placeholder="Local Government" class="form-control required" id="lga" name="lga" type="text">
						</div>
					</div>
                    <div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="town">Town/Village</label>
						<div class="col-lg-8">
							<input  placeholder="Town/Village" class="form-control required" id="town" name="town" type="text">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="area">Area</label>
						<div class="col-lg-8">
							<input  placeholder="Living Area"  class="form-control required" id="area" name="area" type="text">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="house_no">House No</label>
						<div class="col-lg-8">
							<input  placeholder="House No" class="form-control required" id="house_no" name="house_no" type="text">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-4 control-label " for="house_desc">Description</label>
						<div class="col-lg-8">
							<input  placeholder="House Description" class="form-control required" id="house_desc" name="house_desc" type="text">
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
                                        <input  class="form-control" value="{{ old('wdate') }}" id="name" name="wdate" type="date">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="why">
                                <strong>We want to establish connection between the wife family and husband family enable us to easely pass information from one family to another like invetation.  
                                </strong>
                            </div>
                            <div class="tab-pane" id="yes">
                                <div class="form-group clearfix">
                                    <label class="col-lg-4 control-label " for="wfamily">Family Title</label>
                                    <div class="col-lg-8">
                                        <input placeholder="Wife Family Title" class="form-control" value="{{ old('wfamily') }}" id="name" name="wfamily" type="text">
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-lg-4 control-label " for="sname">Wife E-mail address</label>
                                    <div class="col-lg-8">
                                        <input placeholder="Wife E-mail Address" class="form-control" value="{{ old('wemail') }}" id="wemail" name="wemail" type="email">
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