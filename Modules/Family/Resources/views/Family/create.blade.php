@extends('family::layouts.master')

@section('page-title')
{{'Family Application Page'}}
@endsection

@section('page-content')
 <div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <form id="wizard-validation-form" action="{{route('family.store')}}" method="POST">
                @csrf
                <div>
                    <h3>Family Location</h3>
                    <section>
                        <div class="row">
                            <div class="col-md-3">
                                <strong class="lead">Family Location :</strong>
                                {{'The family location information was require to restrict other family having the same family name within your location example we may have two family of the same name but different location.'}}
                            </div>
                            <div class="col-md-9">
                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="Country">Country</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="country" value="Nigeria"name="country" type="text">
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="state">State</label>
                                    <div class="col-lg-10">
                                        <input id="password2" name="state" type="text" class="required form-control">

                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="lga">Local Government</label>
                                    <div class="col-lg-10">
                                        <input id="confirm2" name="lga" type="text" class="required form-control">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="location">Location/ address</label>
                                    <div class="col-lg-10">
                                        <input id="confirm2" name="location" type="text" class="required form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <h3>Family Information</h3>
                    <section>
                        <div class="row">
                            <div class="col-md-3">
                                <strong class="lead">Family Location :</strong>
                                {{'We need your family information to store agains any body who will be register under this family will be a member of this family and any information to be share in this family he will recive it'}}
                            </div>
                            <div class="col-md-9">
                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="userName2">Family Name</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="userName2" name="family" type="text">
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="title">Family Title</label>
                                    <div class="col-lg-10">
                                        <input id="password2" name="title" type="text" class="required form-control">
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="tribe">Tribe</label>
                                    <div class="col-lg-10">
                                        <input id="confirm2" name="tribe" type="text" class="required form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <h3>Family Root</h3>
                    <section>
                        <div class="row">
                            <div class="col-md-3">
                                <strong class="lead">Family Root :</strong>
                                {{'The family root is the father in the family you want to register this can be you, your father or your grandfather and soon'}}
                            </div>
                            <div class="col-md-9">
                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="name">First Name</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="name" name="name" type="text">
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="sname">Last Name</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="sname" name="sname" type="text">
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="email">Email</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="email" name="email" type="text">
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="password">Password</label>
                                    <div class="col-lg-10">
                                        <input id="password2" name="password" type="password" class="required form-control">
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="confirm2">Confirm Password</label>
                                    <div class="col-lg-10">
                                        <input id="confirm2" name="confirm" type="password" class="required form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <h3>Be Notify</h3>
                    <section>
                        <div class="form-group clearfix">
                            <div class="col-lg-12">
                                <input id="acceptTerms-2" name="acceptTerms2" type="checkbox" class="required">
                                <label for="acceptTerms-2">Be notify that a single family accoount is enough to manage all the families in your family, and the information may be share accross those family and other related families,</label>
                            </div>
                            <input type="submit" class="btb btn-primary" value="Create Account">
                        </div>

                    </section>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection