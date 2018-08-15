<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use App\AssignedProjectManager;
use App\Notification;

class ProjectAssignedManagerEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

        public $project;
        public $message;
        /**
         * Create a new event instance.
         *
         * @return void
         */
        public function __construct(AssignedProjectManager $project,Notification $message)
        {

            $this->project=$project;
            $this->message=$message;
        }

        /**
         * Get the channels the event should broadcast on.
         *
         * @return \Illuminate\Broadcasting\Channel|array
         */
        public function broadcastOn()
        {
            $channels = [];
                array_push($channels, new PrivateChannel('projectAssignedManager.'.$this->project->user_id));
                // dd($channels);
             return $channels;
        }
        public function broadcastWith()
        {
            return $this->message->toArray();
        }
}
