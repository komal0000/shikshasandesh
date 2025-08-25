<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        // Get all registrations
        $registrations = Registration::latest()->get();
        return view('admin.registration.index', compact('registrations'));
    }

    public function destroy($id)
    {
        // Find the registration by ID and delete it
        $registration = Registration::findOrFail($id);
        $registration->delete();
        return redirect()->route('admin.registration.index')->with('message', 'Registration deleted successfully!');
    }
}
