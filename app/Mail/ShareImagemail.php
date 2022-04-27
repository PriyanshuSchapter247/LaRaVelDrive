<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShareImagemail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $image;
    public function __construct($image)
    {
        $this->image=$image;
    //    dd($product);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->product);
        $image= $this->image;
        return $this->from(env('MAIL_FROM_ADDRESS'))
                    ->subject("This Image".$image['send_image']."Shared Successfully")
                    ->view('email.shareimagemail',compact(['image']));
    }
}
