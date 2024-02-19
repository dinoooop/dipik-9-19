<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use App\Models\Experience;
use App\Models\Option;
use App\Models\Profile;
use App\Models\Story;
use App\Models\User;
use App\Models\Work;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use stdClass;

class GeneralController extends Controller
{
    public function home(Request $request)
    {
        $profile = Profile::where('status', 1)->first();
        $story = new \stdClass();
        if (!empty($profile->story)) {
            $story = Story::where('id', $profile->story)->first();
        }
        $works = $experiences = [];
        if (!empty($profile->work)) {
            $workIds = expForWhereIn($profile->work);
            $works = Work::whereIn('id', $workIds)
                ->orderByRaw("FIELD(id, {$profile->work})")->get();
        }
        if (!empty($profile->experience)) {
            $experienceIds = expForWhereIn($profile->experience);
            $experiences = Experience::whereIn('id', $experienceIds)
                ->orderByRaw("FIELD(id, {$profile->experience})")->get();
        }

        return view('home', [
            'story' => $story,
            'works' => $works,
            'experiences' => $experiences,
        ]);
    }

    public function blogs(Request $request)
    {
        $blogs = [];
        return view('blogs.index', [
            'story' => $blogs
        ]);
    }

    public function story(Request $request)
    {
        $story = Option::get('story');
        return view('admin.general.story', [
            'story' => $story
        ]);
    }

    public function store(Request $request)
    {

        if ($request->action == 'story') {
            Option::set('story', $request->story);
        }


        return redirect('/admin/story');
    }

    public function contact(Request $request)
    {


        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        // Send the email
        try {

            // Create a new instance of the Mailable class (replace with your actual Mailable class)
            $email = new ContactFormSubmitted($validated);

            // Send the email
            Mail::to('dinoooop@gmail.com')->send($email);

            // If you want to perform some action after the email is sent, you can use the Mail facade events
            Mail::after(function ($message) {
                // Action after the email is sent
            });

            // Redirect or respond with success message
            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            // Handle exceptions, log errors, etc.
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }
}
