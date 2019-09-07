<?php

namespace Agpretto\Newsletter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Agpretto\Newsletter\Http\Requests\SubscribeNewsletter;
use Agpretto\Newsletter\Newsletter;
use Symfony\Component\HttpFoundation\Response;

class NewsletterController extends Controller
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
            return response()->json([
                'message' => 'You have subscribed successfully!'
            ])->setStatusCode(Response::HTTP_CREATED);
        }

        return back();
    }
}
