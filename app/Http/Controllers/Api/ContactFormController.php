<?php
namespace App\Http\Controllers\Api;
use App\Models\ContactForm;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Http\Controllers\Controller;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactFormRequest $request)
    {
        $email = $request->validated();
        $email['user_id'] = auth()->id();
        Emeil::create($email);
        return $this->customApi(ContactFormResource::collection($email),'successfully',200);
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactForm $contactForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactForm $contactForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactForm $contactForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactForm $contactForm)
    {
        //
    }
}
