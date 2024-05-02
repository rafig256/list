<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Message implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $cookie;
    /**
     * Create a new event instance.
     */
    public function __construct($message , $cookie)
    {
        $this->message = $message;
        $this->cookie = $cookie;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
//            new PrivateChannel('message-'.$this->cookie),
            new Channel('message-'.$this->cookie),
        ];
    }

    public function broadcastWith():array{
        return [
            'message' => $this->message,
            'cookie' => $this->cookie,
        ];
    }
}
