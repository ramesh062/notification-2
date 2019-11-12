<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderStatusDatabase extends Notification
{
    use Queueable;

    public $orderStatus="";
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($orderStatus)
    {
        $this->orderStatus=$orderStatus;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'orderId' => "#1111".rand(0,9).rand(0,9),
            'orderStatus' => $this->orderStatus,
        ];
    }

    /**
     * Get the array representation of the notification.
     * toDatabase() and toArray() both are same
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        // return [
        //     'orderId' => "#1111".rand(0,9).rand(0,9),
        //     'orderStatus' => $this->orderStatus,
        // ];
    }
}
