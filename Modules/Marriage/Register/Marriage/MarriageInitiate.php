<?php
namespace Modules\Marriage\Register\Marriage;

use Modules\Marriage\Register\Marriage\ProfileHandle;

class MarriageInitiate extends ProfileHandle
{
	public $profile;

    public $wife;

    public function createWife(Profile $profile)
    {
       $this->wife = $profile->wife()->create([]);
       $profile->update(['marital_status_id'=>2])->save();
    }

    public $husband;

    public function createHusband(Profile $profile)
    {
       $this->husband = $profile->husband()->create([]);
       $profile->update(['marital_status_id'=>2])->save();
    }

    public function createMarriage(Husband $husband)
    {
        $husband->marriage()->create(['wife_id'=>$this->wife->id,'date'=>strtotime($data['mdate'])]);
    }
}
