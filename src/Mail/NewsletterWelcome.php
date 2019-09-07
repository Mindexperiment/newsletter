<?php

namespace Agpretto\Newsletter\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\URL;

class NewsletterWelcome extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The subscription
     * 
     * @var \Agpretto\Newsletter\Newsletter
     */
    protected $subscription;

    /**
     * Create a new message instance.
     *
     * @param \Agpretto\Newsletter\Newsletter
     * @return void
     */
    public function __construct(Newsletter $newsletter)
    {
        $this->subscription = $newsletter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'))
            ->markdown('emails.welcome')
            ->with('unsubscribeLink', $this->getUnsubscribeLink());
    }

    /**
     * Get the unsubscribe link
     * 
     * @return string
     */
    protected function getUnsubscribeLink(): string
    {
        return URL::signedRoute('newsletter.unsubscribe', [
            'email' => $this->subscription->email,
            'list' => $this->subscription->list
        ]);
    }
}
