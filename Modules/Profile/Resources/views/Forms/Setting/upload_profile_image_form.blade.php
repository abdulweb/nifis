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