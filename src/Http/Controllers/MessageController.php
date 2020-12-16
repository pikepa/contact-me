<?php

namespace Pikepa\ContactMe\Http\Controllers;

use Pikepa\ContactMe\Models\Message;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
    }

    public function index()
    {
        $posts = Message::all();

        return view('ContactMe::messages.index', compact('messages'));
    }

    public function show()
    {
        $post = Message::findOrFail(request('message'));

        return view('ContactMe::message.show', compact('message'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required |min:4|max:50',
            'email' => 'required|email',
            'group' => 'required',
            'subject' => 'required |min:4|max:50',
            'content' => 'required|min:4|max:256', 
        ]);

        $message = Message::create([
            'name' => request('name'),
            'email' => request('email'),
            'group' => request('group'),
            'subject' => request('subject'),
            'content' => request('content'), 
        ]);

        return redirect(route('message.show', $message));
    }
}
