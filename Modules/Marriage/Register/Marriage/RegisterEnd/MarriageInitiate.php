<?php
namespace Modules\Marriage\Register\Marriage\RegisterEnd;

use Modules\Marriage\Register\Marriage\RegisterEnd\ProfileHandle;

use Modules\Profile\Entities\Profile;

use Modules\Address\Services\LivingAddress;

use Modules\Marriage\Entities\Husband;

trait MarriageInitiate
{
    use ProfileHandle, LivingAddress;

    public $wife;

    public function createWife(Profile $profile)
    {
        if($this->wifeProfile->wife == null){
        	$this->wife = $this->wifeProfile->wife()->create(['status_id'=>$this->data['wife_status']]);
        }else{
        	$this->wife = $this->wifeProfile->wife;
        }	
    }

    public $husband;

    public function createHusband(Profile $profile)
    {
        if($this->husbandProfile->husband == null){
        	$this->husband = $this->husbandProfile->husband()->create([]);
        }else{
        	$this->husband = $this->husbandProfile->husband;
        }	
    }

    public function createMarriage(Husband $husband)
    {
        $husband->marriages()->create(['wife_id'=>$this->wife->id,'date'=>strtotime($this->data['marriage_date'])]);
    }

    public function marriageAddress()
    {
        $this->husbandProfile->leave()->create(['address_id'=>$this->address()]);
        $this->wifeProfile->leave()->create(['address_id'=>$this->address()]);
    }
}
