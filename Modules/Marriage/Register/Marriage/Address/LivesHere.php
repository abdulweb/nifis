<?php 

namespace Modules\Marriage\Register\Marriage\Address;

use Modules\Address\Services\LivingAddress;

class LivesHere extends LivingAddress

{
    public function __construct(Address $address,Profile $profile)
    {
        $address->leaves()->firstOrCreate(['profile_id'=>$profile->id]);
    }
}