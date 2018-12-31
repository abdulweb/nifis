<?php

namespace Modules\Family\Events;

use Modules\Family\Entities\Family;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class NewFamilyEvent implements ShouldBroadcastNow
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $family;
    
    public function __construct(Family $family)
    {
        $this->family = $family;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    // am not yet implement any channel to broadcast on
    public function broadcastOn()
    {
        return [];
    }
}
