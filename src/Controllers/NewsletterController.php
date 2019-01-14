<?php

namespace Grundmanis\Laracms\Modules\Newsletter\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Grundmanis\Laracms\Modules\Newsletter\Mail\NewsletterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    /**
     * @var User
     */
    private $user;

    /**
     * NewsletterController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('laracms.newsletter::index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function send(Request $request)
    {
        if ($request->to == 'sellers') {
            $users = $this->user->has('shops')->get()->pluck('email');
        }
        else if ($request->to == 'buyers') {
            $users = $this->user->doesntHave('shops')->get()->pluck('email');
        } else {
            $users = $this->user->get()->pluck('email');
        }

        if (empty($users)) {
            return redirect()->back()->with('status', 'No users');
        }

        foreach ($users as $user) {
            Mail::to($user)->send(new NewsletterMail($request->message, $request->subject));
        }

        return redirect()->back()->with('status', 'E-mail was sent!');
    }
}