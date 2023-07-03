<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted; //
use Statamic\Facades\Entry;
use Statamic\Facades\Collection;

class webcontroller extends Controller
{
    public function liveRecording()
    {
        return view('pages.liverecording');
    }

    public function theTribe()
    {
        return view('pages.aboutUs');
    }



    public function musicVideo()
    {
        return view('pages.musicVideo');
    }

    public function realEstate()
    {
        return view('pages.realEstate');
    }

    public function eventLifestyle()
    {
        return view('pages.eventLifestyle');
    }

    public function contactUs()
    {
        return view('pages.contactUs');
    }


    

    public function projects()
    {
        $collection = Collection::findByHandle('case_study');
        
        if (!$collection) {
            // Handle collection not found error
        }
    
        $entries = $collection->queryEntries()->get();
    
        return view('pages.caseStudy', ['entries' => $entries]);
    }
    


   

    public function show($slug)
    {
        $entry = Entry::query()
            ->where('collection', 'case_study')
            ->where('slug', $slug)
            ->first();
 
        return view('pages.caseStudyDetail', ['entry' => $entry]);
    }







    // controller for contact form
    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $emailData = [
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'message' => $validatedData['message'],
        ];

        Mail::to(env('MAIL_TO_ADDRESS'))->send(new ContactFormSubmitted($emailData));

        $request->session()->flash('success', 'Form submitted successfully!');

        return redirect()->back();
    }
}
