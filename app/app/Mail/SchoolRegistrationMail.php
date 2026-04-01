<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SchoolRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $schoolUrl;
    public $schoolId;
    public $tempPassword;
    public $link;

    /**
     * Create a new message instance.
     */
    public function __construct($schoolUrl, $schoolId, $tempPassword,$link)
    {
        $this->schoolUrl = $schoolUrl;
        $this->schoolId = $schoolId;
        $this->tempPassword = $tempPassword;
        $this->link = $link;
    }
    public function build()
    {
        return $this->subject('Your SPARK Olympiads School Login Details')->view('email_template.school_registration');
    }

    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'School Registration Mail',
    //     );
    // }

    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

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
