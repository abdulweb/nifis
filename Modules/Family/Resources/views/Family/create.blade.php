@extends('layouts.home')
     
@section('content')
    <div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Wizard with Validation</b></h4>
            <p class="text-muted m-b-30 font-13">
                Use the button classes on an <code>&lt;a&gt;</code>, <code>&lt;button&gt;</code>, or <code>&lt;input&gt;</code> element.
            </p>

            <form id="wizard-validation-form" action="#">
                <div>
                    <h3>Family</h3>
                    <section>
                        <div class="form-group clearfix">
                            <label class="col-lg-2 control-label " for="userName2">User name </label>
                            <div class="col-lg-10">
                                <input class="form-control" id="userName2" name="userName" type="text">
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-lg-2 control-label " for="password2"> Password *</label>
                            <div class="col-lg-10">
                                <input id="password2" name="password" type="text" class="required form-control">

                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <label class="col-lg-2 control-label " for="confirm2">Confirm Password *</label>
                            <div class="col-lg-10">
                                <input id="confirm2" name="confirm" type="text" class="required form-control">
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-lg-12 control-label ">(*) Mandatory</label>
                        </div>
                    </section>
                    <h3>Step 2</h3>
                    <section>

                        <div class="form-group clearfix">
                            <label class="col-lg-2 control-label" for="name2"> First name *</label>
                            <div class="col-lg-10">
                                <input id="name2" name="name" type="text" class="required form-control">
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-lg-2 control-label " for="surname2"> Last name *</label>
                            <div class="col-lg-10">
                                <input id="surname2" name="surname" type="text" class="required form-control">

                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <label class="col-lg-2 control-label " for="email2">Email *</label>
                            <div class="col-lg-10">
                                <input id="email2" name="email" type="text" class="required email form-control">
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <label class="col-lg-2 control-label " for="address2">Address </label>
                            <div class="col-lg-10">
                                <input id="address2" name="address" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <label class="col-lg-12 control-label ">(*) Mandatory</label>
                        </div>

                    </section>
                    <h3>Step 3</h3>
                    <section>
                        <div class="form-group clearfix">
                            <div class="col-lg-12">
                                <ul class="list-unstyled w-list">
                                    <li><b>First Name :</b> Jonathan </li>
                                    <li><b>Last Name :</b> Smith </li>
                                    <li><b>Emial:</b> jonathan@smith.com</li>
                                    <li><b>Address:</b> 123 Your City, Cityname. </li>
                                </ul>
                            </div>
                        </div>
                    </section>
                    <h3>Step Final</h3>
                    <section>
                        <div class="form-group clearfix">
                            <div class="col-lg-12">
                                <input id="acceptTerms-2" name="acceptTerms2" type="checkbox" class="required">
                                <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                            </div>
                        </div>

                    </section>
                </div>
            </form>
        </div>
    </div>
</div>
@stop


