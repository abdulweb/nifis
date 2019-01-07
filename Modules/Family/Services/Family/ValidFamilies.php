<?php
namespace Modules\Family\Services\Family;

use Modules\Family\Entities\Family;
use Modules\Family\Entities\SubFamily;

class ValidFamilies
{   
	protected $user;

    protected $myFamily;

    protected $myFatherFamily;

    protected $myGRandFatherFamily;

	public $families = [];

	public function __construct(){

        $this->user = Auth()->User();
        $this->getAllFamilies()
	}
    
    private function getAllFamilies()
    {

        $this->myFamily();
        if($this->hasSubFamily($this->myFamily)){
            $this->mySonFamilies();
        }

        if($this->hasMarriedDoughters($this->myFatherFamily)){
        	$this->myDaughterFamilies();
        }
        
        if($this->hasHeadFamily($this->myFamily)){
        	$this->myFatherFamily();
        	$this->myBrotherFamilies();
        }

        if($this->hasMarriedDoughters($this->myFatherFamily)){
        	$this->mySisterFamilies();
        }

        if($this->hasHeadFamily($this->myFatherFamily)){
            $this->myGrandFatherFamily();
            $this->myFatherBrotherFamilies();
        }

    }
    private function hasSubFamily(Family $family)
    {
        if(SubFamily::where('family_id',$family->id)->get() != null){
        	return true;
        }
    }

    private function hasMarriedDoughters(Family $family)
    {
        $flag = false;
        foreach($family->profiles as $$profile){
        	if($profile->wife->marriage->is_active == 1){
        		$flag = true;
        	}
        }
        return $flag;
    }
    private function hasHeadFamily(Family $family)
    {
        if(SubFamily::where('sub_family_id',$family->id)->get() != null){
        	return true;
        }
    }
    private function mySisterFamilies()
    {
        $father = $this->myFatherFamily->admin->profile->husband->father;
        foreach($father->births as $birth){
            $profile = $birth->child->profile;
            if($profile->gender_id == 2){
            	if($profile->wife != null && $profile->wife->marriage->is_active == 1){
            		$husband = $profile->wife->marriage->husband;
            	    $faimilies[] = $husband->profile->admin->family;
            	}
            }
        }
    }
    private function myDaughterFamilies()
    {
        $father = $this->myFamily->admin->profile->husband->father;
        foreach($father->births as $birth){
            $profile = $birth->child->profile;
            if($profile->gender_id == 2){
            	if($profile->wife != null && $profile->wife->marriage->is_active == 1){
            		$husband = $profile->wife->marriage->husband;
            	    $faimilies[] = $husband->profile->admin->family;
            	}
            }
        }
    }
	private function myFamily()
	{
		$family = Family::find($this->user->profile->family->id);
        $this->families[] = $family;
	}

	private function myFatherFamily()
	{
        $family = SubFamily::where('sub_family_id',$this->myFamily->id)->family_id->get();
        $this->myFatherFamily = $family;
        $this->families[] = $family;
	}

    private function myFatherBrotherFamilies()
	{
        foreach(SubFamily::where('family_id',$this->myGrangFatherFamily->id)->get() as $family){
        	if($family->sub_family_id != $myFatherFamily->id){
        		$this->families[] = Family::find($family->sub_family_id);
        	}
        }
	}
   
	private function myGrandfatherFamily()
	{
        $family = SubFamily::where('sub_family_id',$this->myFatherFamily->id)->family_id->get();
        $this->myGrandFatherFamily = $family;
        $this->families[] = $family;
	}

	private function myBrotherFamilies()
	{
        foreach(SubFamily::where('family_id',$this->myFatherFamily->id)->get() as $family){
        	if($family->sub_family_id != $myFamily->id){
        		$this->families[] = Family::find($family->sub_family_id);
        	}
        }
	}

	private function mySonFamilies()
	{
        foreach(SubFamily::where('family_id',$this->myFamily->id)->get() as $family){
        	$this->families[] = Family::find($family->sub_family_id);
        }
	}

}