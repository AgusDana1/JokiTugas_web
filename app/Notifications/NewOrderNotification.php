<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Broadcasting\Channel;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;

class NewOrderNotification extends Notification
{
    use Queueable;

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    // simpan notifikasi di database
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "Pesanan baru di " . ($this->order->user?->name ?? 'Guest'),
            'order_id' => $this->order->id,
            'status' => $this->order->status,
        ];
    }

    // admin monitoring secara realtime
    public function broadcastOn()
    {
        return new Channel('orders');
    }

    public function broadcastAs()
    {
        return 'new-order';
    }
}
