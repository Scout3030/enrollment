<?php

namespace App\Mail;

use App\Models\Enrollment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnrollmentCompleted extends Mailable
{
    use Queueable, SerializesModels;

    private $enrollment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Enrollment $enrollment)
    {
        $this->enrollment = $enrollment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(__('Enrollment process finished successfully'))
            ->markdown('mails.enrollment_completed')
            ->with(['enrollment' => $this->enrollment]);
    }
}
