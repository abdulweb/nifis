@extends('profile::layouts.master')
@section('page-title')
    {{$user->first_name.' '.$user->last_name}}{{"'s Profile"}}
@endsection
@section('page-content')

<!-- end row -->

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="text-center card-box">
                        <div class="member-card">
                            <div class=" member-thumb m-b-10 center-block">
                                <img src="assets/images/users/avatar-1.jpg" class="img-radius" height="250" width="200">
                            </div>
                            <div class="text-left">
                                <p class="text-muted font-13"><strong>Mobile :</strong><span class="m-l-15">{{$user->phone}}</span></p>

                                <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15">{{$user->email}}</span></p>
                            </div>

                        </div>

                    </div> <!-- end card-box -->

                </div> <!-- end col -->
                
                <div class="col-md-8 col-lg-9">
                	<div class="widget widget-tabs widget-tabs-gray border-bottom-none">

    <!-- Widget heading -->
    <div class="widget-head">
       
            <a class="btn btn-primary active" href="#account-details" data-toggle="tab">Profile Details</a>
            <a class="btn btn-success  settings" href="#account-settings" data-toggle="tab">Profile Settings</a>
        
    </div>
    <!-- // Widget heading END -->
    
    <div class="widget-body">
        
            <div class="tab-content">
            
                <!-- Tab content -->
                <div class="tab-pane active" id="account-details">
                    <div class="row">
                        <div class="col-md-3">
                                <strong>Personnel Details</strong>
                        </div>
                    </div> <hr>
                    <div class="row">
                        <div class="separator line bottom"></div>
                    
                        Biography<br />
                        <textarea readonly name="about"id="mustHaveId" class="wysihtml5 form-control" rows="5">{{$user->profile->about_me}}</textarea>
                        
                        <!-- Form actions -->
                        
                        
                        </div>  
                    </div>
                    <hr>
                    <!-- Row -->
                    <div class="row">
                    
                        <!-- Column -->
                        <div class="col-md-6">
                        
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">First Name</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input readonly type="text" value="{{$user->first_name}}" class="form-control" />
                                        <span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="First name is mandatory"><i class="fa fa-question-circle"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Last Name</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input readonly type="text" value="{{$user->last_name}}" class="form-control" />
                                        <span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Last name is mandatory"><i class="fa fa-question-circle"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Date of birth</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input readonly type="text" id="datepicker1" class="form-control" value="{{date('M/D/Y',$user->profile->date_of_birth)}}" />
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                        </div>
                        <!-- // Column END -->
                        
                        <!-- Column -->
                        <div class="col-md-6">
                        
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Gender</label>
                                <div class="col-md-9">
                                    <input readonly type="text" name="gender" value="{{$user->profile->gender->name}}" class="form-control">
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Age</label>
                                <div class="col-md-9">
                                    <input readonly type="text" value="{{floor($user->profile->date/31622400) != 0 ? floor($user->profile->date/31622400) : 'Not Available'}}" class="form-control" />
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                        </div>
                        <!-- // Column END -->
                        
                    </div> <hr>
                    <div class="row">
                        <div class="col-md-3">
                                <strong class="h4">Home Address Details</strong>
                        </div>
                    </div> 
                    <div class="row">
                   
                        
                            <div class="col-md-6">
                            
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Country</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input readonly type="text" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->lga->state->country->name : ''}}" class="form-control" />
                                        <span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="First name is mandatory"><i class="fa fa-question-circle"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">State</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input readonly type="text" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->lga->state->name : ''}}" class="form-control" />
                                        <span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Last name is mandatory"><i class="fa fa-question-circle"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Local Govt</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input readonly type="text" id="datepicker1" class="form-control" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->lga->name : ''}}" />
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                        </div>
                        <!-- // Column END -->
                        
                        <!-- Column -->
                        <div class="col-md-6">
                        
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Town</label>
                                <div class="col-md-9">
                                    <input readonly type="text" name="gender" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->name : ''}}" class="form-control">
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Area</label>
                                <div class="col-md-9">
                                    <input readonly type="text" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->name : ''}}" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">House No</label>
                                <div class="col-md-9">
                                    <input readonly type="text" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->house_no : ''}}" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">House Description</label>
                                <div class="col-md-9">
                                    <input readonly type="text" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->house_desc : ''}}" class="form-control" />
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                        </div>
                        
                   
                        <!-- Column -->
                        
                        <!-- // Column END -->
                        
                    </div> <hr>
                    <!-- // Row END -->
                    <div class="row">
                        <div class="col-md-3">
                                <strong>Work Address Details</strong>
                        </div>
                    </div> 
                    <div class="row">
                   
                        
                            <div class="col-md-6">
                            
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Country</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input readonly type="text" value="{{$user->profile->work != null ? $user->profile->work->address->office->company->town->lga->state->country->name : ''}}" class="form-control" />
                                        <span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="First name is mandatory"><i class="fa fa-question-circle"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">State</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input readonly type="text" value="{{$user->profile->work != null ? $user->profile->work->address->office->company->town->lga->state->name : ''}}" class="form-control" />
                                        <span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Last name is mandatory"><i class="fa fa-question-circle"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Local Govt</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input readonly type="text" id="datepicker1" class="form-control" value="{{$user->profile->work != null ? $user->profile->work->address->office->company->town->lga->name : ''}}" />
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                        </div>
                        <!-- // Column END -->
                        
                        <!-- Column -->
                        <div class="col-md-6">
                        
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Town</label>
                                <div class="col-md-9">
                                    <input readonly type="text" name="gender" value="{{$user->profile->work != null ? $user->profile->work->address->office->company->town->name : ''}}" class="form-control">
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Organisation</label>
                                <div class="col-md-9">
                                    <input readonly type="text" value="{{$user->profile->work != null ? $user->profile->work->address->office->company->name : ''}}" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Office</label>
                                <div class="col-md-9">
                                    <input readonly type="text" value="{{$user->profile->work != null ? $user->profile->work->address->office->name : ''}}" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Position</label>
                                <div class="col-md-9">
                                    <input readonly type="text" value="{{$user->profile->work != null ? $user->profile->work->address->position : ''}}" class="form-control" />
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                        </div>
                        
                   
                        <!-- Column -->
                        
                        <!-- // Column END -->
                        
                    </div> <hr>
                    <!-- // Row END -->
                    <div class="row">
                        <div class="col-md-3">
                                <strong>Contact Details</strong>
                        </div>
                    </div> <hr>
                    <div class="row">
                    
                        <div class="col-md-6">
                        
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Phone</label>
                                <div class="col-md-9">
                                    <div class="">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input readonly name="phone" type="text" id="inputPhone" class="form-control" placeholder="01234567897" value="{{$user->phone}}" />
                                    </div>
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">E-mail</label>
                                <div class="col-md-9">
                                    <div class="">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input readonly name="email" type="text" id="inputEmail" class="form-control" placeholder="contact@mosaicpro.biz" value="{{Auth()->User()->email}}"  />
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Facebook</label>
                                <div class="col-md-9">
                                    <div class="">
                                        <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                        <input readonly name="facebook" type="text" id="inputFacebook" class="form-control" placeholder="mosaicpro" value="{{'isah labbo bagudo'}}"  />
                                    </div>
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                        </div>
                        <!-- // Column END -->
                        
                        <!-- Column -->
                        <div class="col-md-6">
                        
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Twitter</label>
                                <div class="col-md-9">
                                    <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                    <input readonly name="twitter" type="text" id="inputTwitter" class="form-control" placeholder="mosaicpro"  value="{{'isah labbo'}}"  />
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Skype ID</label>
                                <div class="col-md-9">
                                    <span class="input-group-addon"><i class="fa fa-skype"></i></span>
                                    <input readonly name="skype" type="text" id="inputSkype" class="form-control" placeholder="mySkypeID"  value="{{'isah labbo'}}"  />
                                        
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Google</label>
                                <div class="col-md-9">
                                    <span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
                                    <input readonly name="google" type="text" id="inputgplus" class="form-control" placeholder="google ID"  value="{{'isahlabbo22@google.com'}}"  />
                                        
                                </div>
                            </div>

                            
                        </div>
                        <!-- // Group END -->
                    </div>
                   
                    <!-- // Column END --> 
                
                    
                    <!-- // Form actions END -->
                    
                
                <!-- // Tab content END -->
                
                <!-- Tab content -->

                
                
                    
                <div class="tab-pane" id="account-settings">
                 
                    <!-- Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <strong>Update Biography</strong>
                        </div>
                    </div> 
                    <hr>
                    <div class="row">
                        <form action="{{route('profile.update')}}" method="post">
                        @csrf
                        <div class="col-md-10">

                            <div class="separator line bottom"></div>
                            Biography<br />
                            <textarea name="about_me"id="mustHaveId" class="wysihtml5 form-control" rows="5">{{$user->profile->about_me}}</textarea>
                            <!-- Form actions -->
                            <div class="separator top">
                                <button type="submit" name="submit" value="new_biography" class="btn btn-primary"><i class="fa fa-fw fa-check"></i> Save changes</button>
                                <button type="button" class="btn btn-default"><i class="fa fa-fw fa-times"></i> Cancel</button>
                            </div>

                        </div>
                        </form>
                    </div>
                    <hr> 
                    <div class="row">
                        <div class="col-md-12">
                            <strong>Update Home Address</strong>
                        </div>
                    </div> <hr>
                    <div class="row">
                    
                    <div class="col-md-6">
                     <form action="{{route('profile.update')}}" method="post">
                     @csrf       
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Country</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" name="country" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->lga->state->country->name : ''}}" class="form-control" />
                                        <span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="First name is mandatory"><i class="fa fa-question-circle"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">State</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" name="state" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->lga->state->name : ''}}" class="form-control" />
                                        <span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Last name is mandatory"><i class="fa fa-question-circle"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Local Govt</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" name="lga" id="datepicker1" class="form-control" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->lga->name : ''}}" />
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                        </div>
                        <!-- // Column END -->
                        
                        <!-- Column -->
                        <div class="col-md-6">
                        
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Town</label>
                                <div class="col-md-9">
                                    <input type="text" name="town" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->town->name : ''}}" class="form-control">
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Area</label>
                                <div class="col-md-9">
                                    <input type="text"name="area" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->area->name : ''}}" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">House No</label>
                                <div class="col-md-9">
                                    <input type="text" name="house_no" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->house_no : ''}}" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">House Description</label>
                                <div class="col-md-9">
                                    <input type="text" name="house_desc" value="{{$user->profile->leave != null ? $user->profile->leave->address->house->house_desc : ''}}" class="form-control" />
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                        </div>

                        <button type="submit" name="submit" value="home_address" class="btn btn-primary"><i class="fa fa-fw fa-check"></i> Update Address</button>
                       

                    </form>
                    </div>
                    
                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                                <strong>Update Business Address</strong>
                        </div>
                    </div> <hr>
                    <div class="row">
                    
                    <div class="col-md-6">
                     <form action="{{route('profile.update')}}" method="post">
                     @csrf       
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Country</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" name="country" value="{{$user->profile->work != null ? $user->profile->work->address->office->company->town->lga->state->country->name : ''}}" class="form-control" />
                                        <span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="First name is mandatory"><i class="fa fa-question-circle"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">State</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" name="state" value="{{$user->profile->work != null ? $user->profile->work->address->office->company->town->lga->state->name : ''}}" class="form-control" />
                                        <span class="input-group-addon" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Last name is mandatory"><i class="fa fa-question-circle"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Local Govt</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" name="lga" id="datepicker1" class="form-control" value="{{$user->profile->work != null ? $user->profile->work->address->office->company->town->lga->name : ''}}" />
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                        </div>
                        <!-- // Column END -->
                        
                        <!-- Column -->
                        <div class="col-md-6">
                        
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Town</label>
                                <div class="col-md-9">
                                    <input type="text" name="town" value="{{$user->profile->work != null ? $user->profile->work->address->office->company->town->name : ''}}" class="form-control">
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                            <!-- Group -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Company</label>
                                <div class="col-md-9">
                                    <input type="text" name="company" value="{{$user->profile->work != null ? $user->profile->work->address->office->company->name : ''}}" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Office</label>
                                <div class="col-md-9">
                                    <input type="text" name="office" value="{{$user->profile->work != null ? $user->profile->work->address->office->name : ''}}" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Position</label>
                                <div class="col-md-9">
                                    <input type="text" name="position" value="{{$user->profile->work != null ? $user->profile->work->address->position : ''}}" class="form-control" />
                                </div>
                            </div>
                            <!-- // Group END -->
                            
                        </div>

                        <button type="submit" name="submit" value="business_address" class="btn btn-primary"><i class="fa fa-fw fa-check"></i> Update Address</button>
                       

                    </form>
                    </div>
                    
                    <hr>
                    <div class="row">
                    
                        <!-- Column -->
                        <div class="col-md-3">
                            <strong>Add New Business</strong>
                            <p class="muted">You can add new business acquire to the list of the business you already have</p>
                        </div>
                        <!-- // Column END -->
                        
                        <!-- Column -->
                        <div class="col-md-9">
                            <div class="separator bottom"></div>
                            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data"> 
                                @csrf      
                                <label for="inputPasswordOld">Business Title</label>
                                <div class="input-group">
                                    <input name="business" type="text"  class="form-control" value="" placeholder="Leave empty for no change" />
                                    <span class="input-group-addon" data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Leave empty if you don't wish to add any skill"><i class="icon-question-sign"></i></span>
                                </div>
                                <label for="">About Business</label>
                                <div class="input-group">
                                    <textarea name="about" id="" cols="100" rows="5"></textarea>
                                </div>
                                <div class="separator bottom"></div>
                                <div class="form-actions" style="margin: 0;">
                                    <button  type="submit" name="submit" value="new business" class="btn btn-primary" /><i class="fa fa-check"></i> Add Business </button>
                                </div>
                            </form>
                        </div>
                    </div><hr />


                    <hr>
                    <div class="row">
                    
                        <!-- Column -->
                        <div class="col-md-3">
                            <strong>Add New Work History</strong>
                            <p class="muted">You can add new work history acquire to the list of the business you already have</p>
                        </div>
                        <!-- // Column END -->
                        
                        <!-- Column -->
                        <div class="col-md-9">
                            <div class="separator bottom"></div>
                            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data"> 
                                @csrf      
                                <label for="inputPasswordOld">Date</label>
                                <div class="input-group">
                                    <input name="date" type="date"  class="form-control" value="" placeholder="Leave empty for no change" />
                                    <span class="input-group-addon" data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Leave empty if you don't wish to add any skill"><i class="icon-question-sign"></i></span>
                                </div>
                                <label for="">History</label>
                                <div class="input-group">
                                    <textarea name="about" id="" cols="100" rows="5"></textarea>
                                </div>
                                <div class="separator bottom"></div>
                                <div class="form-actions" style="margin: 0;">
                                    <button  type="submit" name="submit" value="work_history" class="btn btn-primary" /><i class="fa fa-check"></i> Add Work History </button>
                                </div>
                            </form>
                        </div>
                    </div><hr />

                    <!-- Row -->
                    <div class="row">
                    
                        <!-- Column -->
                        <div class="col-md-3">
                            <strong>Add New Skill</strong>
                            <p class="muted">You can add new skill acquire to the list of the skills you already have</p>
                        </div>
                        <!-- // Column END -->
                        
                        <!-- Column -->
                        <div class="col-md-9">
                            <div class="separator bottom"></div>
                            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data"> 
                                @csrf      
                                <label for="inputPasswordOld">Skill Title</label>
                                <div class="input-group">
                                    <input name="skill" type="text"  class="form-control" value="" placeholder="Leave empty for no change" />
                                    <span class="input-group-addon" data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Leave empty if you don't wish to add any skill"><i class="icon-question-sign"></i></span>
                                </div>
                                <label for="">About Skill</label>
                                <div class="input-group">
                                    <textarea name="about" id="" cols="100" rows="5"></textarea>
                                </div>
                                <div class="separator bottom"></div>
                                <div class="form-actions" style="margin: 0;">
                                    <button  name="submit" value="new_skill" type="submit" class="btn btn-primary" /><i class="fa fa-check"></i> Add Skill </button>
                                </div>
                            </form>
                        </div>
                    </div><hr />

                    <div class="row">
                    
                        <!-- Column -->
                        <div class="col-md-3">
                            <strong>Add New Experience</strong>
                            <p class="muted">You can add new working experience if acquire to the list of the experiences you already have</p>
                        </div>
                        <!-- // Column END -->
                        
                        <!-- Column -->
                        <div class="col-md-9">
                            <div class="separator bottom"></div>
                            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data"> 
                            @csrf           
                            <label for="inputPasswordOld">Experience Title</label>
                            <div class="input-group">
                                <input name="experience" type="text" id="inputPasswordOld" class="form-control" value="" placeholder="Leave empty for no change" />
                                <span class="input-group-addon" data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Leave empty if you don't wish to add any skill"><i class="icon-question-sign"></i></span>
                            </div>
                            <label for="">About Experience</label>
                            <div class="input-group">
                                    <textarea name="about" id="" cols="100" rows="5"></textarea>
                            </div>
                            <div class="separator bottom"></div>
                            <div class="form-actions" style="margin: 0;">
                                <button name="submit" value="new_experience" type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Add Experience</button>
                            </div>
                            </form>
                        </div>
                    </div><hr />
                    
                    <div class="row">
                    
                        <div class="col-md-3">
                            <strong>Update Profile Picture</strong>
                            <p class="muted">You can update your profile picture to make you identical in and out of your family</p>
                        </div>
                        <!-- // Column END -->
                        
                        <!-- Column -->
                        <div class="col-md-9">
                            <div class="separator bottom"></div>
                            <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                                @csrf            
                                <label for="inputPasswordOld">Upload Picture</label>
                                <div class="input-group">
                                    <input name="image" type="file" class="form-control" />
                                </div>
                                <div class="separator bottom"></div>
                                <div class="form-actions" style="margin: 0;">
                                    <button name="submit" value="profile_image"type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Upload Picture </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                    
                        <!-- Column -->
                        <div class="col-md-3">
                            <strong>Add New Certificate</strong>
                            <p class="muted">You can add new certificate acquired to the list of the certificate you already have</p>
                        </div>
                        <!-- // Column END -->
                        
                        <!-- Column -->
                        <div class="col-md-9">
                            <div class="separator bottom"></div>
                            <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                                @csrf 
                                <label for="inputPasswordOld">Certificate Name</label>
                            <div class="">
                                <input name="name" type="text"  class="form-control" value="{{old('name')}}" placeholder="example primary certificate" />
                            </div>          
                            <label for="inputPasswordOld">Upload Certificate</label>
                            <div class="input-grop">
                                <input name="certificate" type="file" id="inputPasswordOld" class="form-control" value="" placeholder="Leave empty for no change" />
                                
                            </div>
                            <label for="inputPasswordOld">Date Issued</label>
                            <div class="">
                                <input name="date" type="date"  class="form-control" value="" placeholder="Leave empty for no change" />
                            </div>
                            <div class="separator bottom"></div>
                            <div class="form-actions" style="margin: 0;">
                                <button name="submit" value="new_certificate"type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Add New Certificate</button>
                            </div>
                            </form>
                        </div>
                    </div><hr />
                   
                    <div class="row">
                    
                        <!-- Column -->
                        <div class="col-md-3">
                            <strong>Change Picture</strong>
                            <p class="muted">So many people may bear with <strong><{{$user->first_name.' '.$user->last_name}}</strong> You can make your profile identical by uploading the picture of your face</p>
                        </div>
                        <!-- // Column END -->
                        
                        <!-- Column -->
                        <div class="col-md-9">
                            <div class="separator bottom"></div>
                                    
                            <label for="inputPasswordOld">Change profile Picture</label>
                            <div class="input-group">
                                <input name="skill" type="file" id="inputPasswordOld" class="form-control" value="" placeholder="Leave empty for no change" />
                                <span class="input-group-addon" data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Leave empty if you don't wish to add any skill"><i class="icon-question-sign"></i></span>
                            </div>
                            <div class="separator bottom"></div>
                            <div class="form-actions" style="margin: 0;">
                                <button name="submit" value="change_profile_image" type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Upload Picture</button>
                            </div>
                        </div>
                    </div><hr />
                    <div class="separator line bottom"></div>
                        
                        <div class="row">
                    
                        <!-- Column -->
                        <div class="col-md-3">
                            <strong>Reset Profile Picture</strong>
                            <p class="muted">If your profile picture look old or other reason that warant to change your profile picture you can do it here</p>
                        </div>
                        <!-- // Column END -->
                        
                        <!-- Column -->
                        <div class="col-md-9">
                            <div class="separator bottom"></div>
                            <div class="form-actions" style="margin: 0;">
                                <button name="add_skill" type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Reset Picture</button>
                            </div>
                        </div>
                    </div><hr />
                    <div class="separator line bottom"></div>
                    
                    <!-- Row -->
                    <div class="row">
                    
                        <!-- Column -->
                        <div class="col-md-3">
                            <strong>Add Contact</strong>
                            <p class="muted">We can help you save your contact details via Your family</p>
                        </div>
                        <!-- // Column END -->
                        
                        <!-- Column -->
                        <div class="col-md-9">
                            <div class="row">
                            <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-8">
                                    <label for="inputPhone">Contact Address</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                        <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                        <span class="input-group-addon"><i class="fa fa-skype"></i></span>
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
                                        <input name="contact" type="text" id="inputPhone" class="form-control" placeholder="Enter contact address" value="{{old('contact')}}" />
                                    </div>
                                    <div class="separator bottom"></div>
                                        
                                    <label for="inputEmail">Contact Type</label>
                                    <div class="">
                                        <select name="type" id="" class="form-control">
                                        <option value=""></option>
                                        
                                            <option value="{{'1'}}">{{'Facebook'}}</option>
                                            
                                        </select>
                                    </div>
                                    <div class="separator bottom"></div>
                                    <div class="form-actions" style="margin: 0;">
                                        <button name="submit" value="new_contact" type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save Contact</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                        <!-- // Column END -->
                        
                    </div>
                    <!-- // Row END -->
                    
                    <!-- Form actions -->
                    
                    <!-- // Form actions END -->
                    
                </div>
                <!-- // Tab content END -->
            </div>
        
    </div>
</div>
<!-- // Widget END -->

                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
</div>
<!-- End row -->

@endsection
