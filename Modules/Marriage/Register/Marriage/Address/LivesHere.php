<?php 

namespace App\Services\Register\Marriage\Lives;

use App\Services\Register\Marriage\Lives\Family;

class LivesFamily

{
    public function __construct($family_id,$user_id,$address_id)
    {
        $family = new Family();
        $family->use_family($family_id,$user_id);
        $family->lives_in($address_id,$user_id);
    }
}