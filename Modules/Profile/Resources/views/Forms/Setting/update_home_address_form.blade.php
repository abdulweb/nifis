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