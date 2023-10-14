<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PLaceOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    
    public function __construct($order)
    {
        $this->order = $order;
    }

    
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'You order has been placed!',
            from: new Address('sales@zenda.com', 'Sales Team')
        );
    }

   
    public function content(): Content
    {
        return new Content(
            view: 'site.mails.order-invoice',
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
