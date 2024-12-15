<?php

namespace App\Mail;

use App\Models\Order;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use Illuminate\Mail\Mailables\Address;


class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;
    protected $table = 'orders'; // testテーブルを参照する


    /**
     * Create a new message instance.
     */
    public function __construct(
        public Order $order, //引数をパブリックプロパティに設定する（自動的にビューで利用できるようになる）
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('test@example.com','Test'),
            subject: 'Order Shipped',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.mailsend',
            // text: 'emails.mailsend-text',

        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
