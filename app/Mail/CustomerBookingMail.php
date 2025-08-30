<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerBookingMail extends Mailable implements ShouldQueue


{
    use Queueable, SerializesModels;

    public $booking;

    /**
     * Creating a new message instance.
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Building the message.
     */
   public function build(): self
{
    return $this->subject('Your Booking Confirmation - Speed On Transport')
                ->view('emails.customer-booking');
}

}
