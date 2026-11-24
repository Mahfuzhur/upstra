<?php

namespace App\Http\Controllers;

use App\Models\{Application, Client, Member, Message, Opening, Post, Project, Subscriber, Testimonial};
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        return view('home', [
            'clients' => Client::orderBy('sort')->get(),
            'projects' => Project::orderBy('sort')->get(),
            'testimonials' => Testimonial::latest()->get(),
        ]);
    }

    public function products() { return view('products'); }

    public function about() { return view('about', ['members' => Member::orderBy('sort')->get()]); }

    public function career()
    {
        return view('career', ['openings' => Opening::where('is_open', true)->latest('posted_on')->get()]);
    }

    public function opening(Opening $opening) { return view('opening', compact('opening')); }

    public function apply(Request $r)
    {
        $d = $r->validate([
            'opening_id' => 'nullable|exists:openings,id',
            'first_name' => 'required|max:100',
            'last_name'  => 'nullable|max:100',
            'email'      => 'required|email',
            'message'    => 'nullable|max:3000',
            'resume'     => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);
        if ($r->hasFile('resume')) {
            $d['resume'] = $r->file('resume')->store('resumes'); // private disk, downloadable from admin only
        }
        Application::create($d);
        return back()->with('ok', 'Thank you! We have received your application.');
    }

    public function blog(Request $r)
    {
        $limit = max(6, (int) $r->query('n', 6));
        $all = Post::latest('published_at')->latest('id')->take($limit + 1)->get();
        return view('blog', [
            'featured' => Post::where('is_featured', true)->latest('published_at')->latest('id')->take(3)->get(),
            'posts' => $all->take($limit),
            'more' => $all->count() > $limit ? $limit + 6 : null,
        ]);
    }

    public function post(Post $post) { return view('post', compact('post')); }

    public function contact() { return view('contact'); }

    public function send(Request $r)
    {
        $d = $r->validate([
            'first_name' => 'required|max:100',
            'last_name'  => 'nullable|max:100',
            'email'      => 'required|email',
            'phone'      => 'nullable|max:40',
            'subject'    => 'nullable|max:150',
            'message'    => 'required|max:5000',
        ]);
        Message::create($d);
        return back()->with('ok', 'Thank you! Your message has been sent. We will get back to you soon.');
    }

    public function subscribe(Request $r)
    {
        $d = $r->validate(['email' => 'required|email']);
        Subscriber::firstOrCreate($d);
        return back()->with('ok', 'You are subscribed. Thank you!');
    }
}
