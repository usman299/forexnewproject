<?php

namespace App\Mail;

use App\Helpers\Helper\Helper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransferMail extends Mailable
{
    use Queueable, SerializesModels;
     public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        return $this->view('emails.email_template')->subject('Welcome to Our Application')
        return $this->markdown(Helper::theme().'user.p2p.email')->subject('P2P Transfer')->with('data', $this->data);
    }
}
