<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class QueryVacationUSER extends Mailable
{
    use Queueable, SerializesModels;


    public $request; //funcion publica para que sea usada por toda la case


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

    /*$localhost.'/storage/jobs/'. $this->request->pdfNameToStore*/

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Confirmacion solucitud dias de vacaciones ')
            ->view('emails.userVacation');
    }
}
