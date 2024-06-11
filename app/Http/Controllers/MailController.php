<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestMail;

class MailController extends Controller
{
    /**
     * Display the mail form.
     *
     * @return \Illuminate\View\View
     */
    public function showMailForm()
    {
        return view('send_mail_form');
    }

    /**
     * Handle the mail sending.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendMail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $details = [
            'title' => 'Mail from Your Application',
            'body' => $request->input('message') 
        ];

        Mail::to($request->input('email'))->send(new MyTestMail($details));

        return redirect()->back()->with('success', 'Email is Sent.');
    }
}
