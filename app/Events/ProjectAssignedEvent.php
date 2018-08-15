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
use App\AssignedProject;
use App\Notification;

class ProjectAssignedEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $project;
    public $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(AssignedProject $project,Notification $message)
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
          foreach ($this->project->AssignedProjectTeam as $user) {
            array_push($channels, new PrivateChannel('projectAssigned.'.$user->user->id));
          }
            array_push($channels, new PrivateChannel('manager'));
            // dd($channels);
         return $channels;
    }
    public function broadcastWith()
    {
        return $this->message->toArray();
    }
}
