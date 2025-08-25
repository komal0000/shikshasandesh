<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegisterController extends Controller
{
    // Display the registration form
    public function showForm()
    {
        return view('front.newPage.add.register'); //
    }

    // Handle form submission
    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'message' => 'nullable|string',
        ]);

        // Store in the database
        Registration::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'message' => $validatedData['message'],
        ]);

        // Redirect to the homepage with success message
        return redirect('contact')->with('success', 'Registration submitted successfully!');
    }
}
