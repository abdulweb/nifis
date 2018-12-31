@extends('marriage::layouts.master')

@section('page-title')
{{'Marriage Registration Page'}}
@endsection

@section('page-content')
<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			<form id="wizard-vertical">
				<h3>Husband Info</h3>
				<section>
					<div class="form-group clearfix">
						<label class="col-lg-3 control-label " for="userName1">Husband First Name</label>
						<div class="col-lg-9">
							<input palceholder="Husband First Name" class="form-control required" id="userName1" name="userName" type="text">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-3 control-label " for="password1">Husband Last Name</label>
						<div class="col-lg-9">
							<input id="password1" name="password" type="text" class="required form-control">
						</div>
					</div>
				</section>
				<h3>Wife Info</h3>
				<section>
					<div class="form-group clearfix">
						<label class="col-lg-3 control-label " for="userName1">Wife First Name</label>
						<div class="col-lg-9">
							<input class="form-control required" id="userName1" name="userName" type="text">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-3 control-label " for="userName1">Wife last Name</label>
						<div class="col-lg-9">
							<input class="form-control required" id="userName1" name="userName" type="text">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-3 control-label " for="userName1">Wife Status</label>
						<div class="col-lg-9">
							<input class="form-control required" id="userName1" name="userName" type="text">
						</div>
					</div>
				</section>
				<h3>Marriage Info</h3>
				<section>
					<div class="form-group clearfix">
						<label class="col-lg-3 control-label " for="userName1">Date Of Marriage</label>
						<div class="col-lg-9">
							<input class="form-control required" id="userName1" name="userName" type="text">
						</div>
					</div>
				</section>
				<h3>Address Info</h3>
				<section>
					<div class="form-group clearfix">
						<label class="col-lg-3 control-label " for="userName1">Country</label>
						<div class="col-lg-9">
							<input class="form-control required" id="userName1" name="userName" type="text">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-3 control-label " for="userName1">State</label>
						<div class="col-lg-9">
							<input class="form-control required" id="userName1" name="userName" type="text">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-3 control-label " for="userName1">Local Government</label>
						<div class="col-lg-9">
							<input class="form-control required" id="userName1" name="userName" type="text">
						</div>
					</div>
                    <div class="form-group clearfix">
						<label class="col-lg-3 control-label " for="userName1">Town/Village</label>
						<div class="col-lg-9">
							<input class="form-control required" id="userName1" name="userName" type="text">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-3 control-label " for="userName1">Area</label>
						<div class="col-lg-9">
							<input class="form-control required" id="userName1" name="userName" type="text">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-3 control-label " for="userName1">House No</label>
						<div class="col-lg-9">
							<input class="form-control required" id="userName1" name="userName" type="text">
						</div>
					</div>
					<div class="form-group clearfix">
						<label class="col-lg-3 control-label " for="userName1">Description</label>
						<div class="col-lg-9">
							<input class="form-control required" id="userName1" name="userName" type="text">
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
                                                    <label class="col-lg-3 control-label " for="name">Wife Date Date Of Birth</label>
                                                    <div class="col-lg-9">
                                                        <input placeholder="Root First Name" class="form-control" value="{{ old('name') }}" id="name" name="name" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="why">
                                                <strong>We want to establish connection between the wife family and husband family enable us to easely pass information from one family to another like invetation.  
                                                </strong>
                                            </div>
                                            <div class="tab-pane" id="yes">
                                                <div class="form-group clearfix">
                                                    <label class="col-lg-3 control-label " for="name">Family Title</label>
                                                    <div class="col-lg-9">
                                                        <input placeholder="Root First Name" class="form-control" value="{{ old('name') }}" id="name" name="name" type="text">
                                                    </div>
                                                </div>

                                                <div class="form-group clearfix">
                                                    <label class="col-lg-3 control-label " for="sname">Wife E-mail address</label>
                                                    <div class="col-lg-9">
                                                        <input placeholder="Root Last Name" class="form-control" value="{{ old('sname') }}" id="sname" name="sname" type="text">
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