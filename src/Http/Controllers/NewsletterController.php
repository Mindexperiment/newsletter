<?php

namespace Agpretto\Newsletter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Agpretto\Newsletter\Http\Requests\SubscribeNewsletter;
use Agpretto\Newsletter\Newsletter;

class NewsletterController extends Controllers
{
    /**
     * Handle newsletter subscription
     * 
     * @param \Agpretto\Newsletter\Http\Requests\SubscribeNewsletter $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function subscribe(SubscribeNewsletter $request)
    {
        $subscription = Newsletter::create($request->all());

        if ( $request->wantsJson() ) {
            return $adv;
        }

        return back();
    }
}
