<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    protected $reserve;

    public function __construct($user, $reserve)
    {
        $this->user = $user;
        $this->reserve = $reserve;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reserve-reminder')
            ->subject('ご予約の確認')
            ->with(['user' => $this->user, 'reserve' => $this->reserve]);
    }
}
