<?php
namespace App\Http\Controllers\Api;
use App\Models\ContactForm;

<<<<<<<< HEAD:app/Http/Controllers/Api/ContactFormController.php
use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Http\Controllers\Controller;

class ContactFormController extends Controller
========
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class ordercontroller extends Controller
>>>>>>>> 303e8c2 (تحضير التعديلات قبل الـ pull):app/Http/Controllers/api/ordercontroller.php
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
<<<<<<<< HEAD:app/Http/Controllers/Api/ContactFormController.php
    public function show(ContactForm $contactForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactForm $contactForm)
========
    public function show(string $id)
>>>>>>>> 303e8c2 (تحضير التعديلات قبل الـ pull):app/Http/Controllers/api/ordercontroller.php
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
<<<<<<<< HEAD:app/Http/Controllers/Api/ContactFormController.php
    public function update(Request $request, ContactForm $contactForm)
========
    public function update(Request $request, string $id)
>>>>>>>> 303e8c2 (تحضير التعديلات قبل الـ pull):app/Http/Controllers/api/ordercontroller.php
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
<<<<<<<< HEAD:app/Http/Controllers/Api/ContactFormController.php
    public function destroy(ContactForm $contactForm)
    {
        //
    }
========
    public function destroy(string $id)
    {
        //
    }

>>>>>>>> 303e8c2 (تحضير التعديلات قبل الـ pull):app/Http/Controllers/api/ordercontroller.php
}
