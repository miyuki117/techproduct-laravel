<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InformationNotification extends Notification
{
    use Queueable;

    protected $message;
    protected $user_id; 

    /**
     * Create a new notification instance.
     */
    public function __construct(string $message, string $user_id)
    {
        $message = $this ->message;
        $user_id = $this ->user_id;
    }

    /**
     * メール、データベース通知を指定
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable): array
    {
        return $notifiable->prefers_sms ? ['vonage'] : ['mail'];
    }

    /**
     * メール通知の送信
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        // $message = $this ->message; //←参考(メール本文で使いたい関数あればここに設定可能）

        return (new MailMessage)
                ->subject('New test')
                ->line("{$this->message} is refistered");
    }

    /**
     * 通知をデータベースに保存
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message$message' => $this->message,
            'user_id' => $this->user_id,
        ];
    }
}
