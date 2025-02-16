<?php

namespace App\Events;

use App\Models\Task;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id;
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->user_id = $data['user_id'];
        $this->message = $data['message'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new channel('task-notification');
        return ['task-notification'];
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->task->id,
            'name' => $this->task->name,
            'complete' => $this->task->complete,
        ];
    }
}
