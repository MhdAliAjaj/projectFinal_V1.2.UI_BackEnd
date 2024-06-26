<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestMail;
use App\Models\MailData;

class MailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

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
     * Handle storing the mail data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeMailData(Request $request)
    {
        $request->validate([
            'employee_email' => 'required|email',
            'customer_email' => 'required|email',
            'message' => 'required'
        ]);

        // Store in database
        MailData::create([
            'employee_email' => $request->input('employee_email'),
            'customer_email' => $request->input('customer_email'),
            'message' => $request->input('message')
        ]);

        return redirect()->back()->with('success', 'Data is Stored.');
    }

    /**
     * Handle sending the mail.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendMailAPI(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:mail_data,id'
        ]);

        $mailData = MailData::find($request->input('id'));

        $details = [
            'title' => 'Mail from Your Application',
            'body' => $mailData->message
        ];

        // Send mail
        Mail::to($mailData->customer_email)
            ->from($mailData->employee_email)
            ->send(new MyTestMail($details));

        return response()->json(['success' => 'Email is Sent.']);
    }
}
