<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestMail;
use App\Models\User;

class MailController extends Controller
{
    /**
     * Display the mail form.
     *
     * @return \Illuminate\View\View
     */
    public function showMailForm(string $id)
    {
        $user = User::where('id', $id)->get();
        $user=$user[0];
        return view('send_mail_form' , compact('user'));
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
