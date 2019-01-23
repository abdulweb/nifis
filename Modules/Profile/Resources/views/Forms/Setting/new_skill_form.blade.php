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