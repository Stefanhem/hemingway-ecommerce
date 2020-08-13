<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmOrderMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $isFreeDelivery;

    /**
     * Create a new message instance.
     *
     * @param array $data
     */
    public function __construct(array $data, bool $isFreeDelivery = null)
    {
        $this->data = $data;
        $this->isFreeDelivery = $isFreeDelivery;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Narudžbina je prihvaćena')
        ->to($this->data['email'])
        ->from('sales@hemingwayleather.com')
        ->view('mails.order-confirm-customer', ['data' => $this->data, 'isFreeDelivery' => $this->isFreeDelivery]);
    }
}
