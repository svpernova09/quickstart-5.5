<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarketingJoinRequest;
use App\Mail\VerifyEmail;
use App\MarketingEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class MarketingEmailController extends Controller
{
    public function showJoin()
    {
        return view('marketing.join');
    }

    public function doJoin(MarketingJoinRequest $request)
    {
        $marketing_email = MarketingEmail::create([
           'email' => $request->email,
           'active' => 0,
           'hash' => Password::getRepository()->createNewToken(),
        ]);

        Mail::to($request->email)->send(new VerifyEmail($marketing_email));

        return redirect()->route('show-pending');
    }

    public function showPending()
    {
        return view('marketing.pending');
    }

    public function validateEmailHash(Request $request)
    {
        $email = MarketingEmail::where('hash', $request->hash)->firstOrFail();

        $email->active = 1;
        $email->save();

        return view('marketing.active');
    }
}
