<?php

namespace App\Http\Controllers;

use App\Notifications\NewNotification;
use Illuminate\Support\Facades\Notification;

class NotificationsController extends Controller
{
    public function create() {
        return view('new-notification');
    }

    public function store(){
        Notification::send(request()->user(), new NewNotification());

        return redirect('/notifications/new')->with('message', 'Notification sent');
    }
}
