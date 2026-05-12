<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('frontend.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        Contact::create([
            'user_id' => auth()->id(),
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully! We will reply soon.');
    }
}