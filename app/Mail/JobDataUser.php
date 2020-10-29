<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class JobDataUser extends Mailable
{
    use Queueable, SerializesModels;


    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $formRequest)
    {
        //
        //data del request
        $this->request = $formRequest;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Postulacion a la plaza '.$this->request->title)
            ->view('emails.userApply');
    }
}
