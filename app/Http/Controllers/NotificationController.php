<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Consultar las notificaciones
        $notifications = Auth::user()->unreadNotifications;

        // Limpiar las notificaciones
        Auth::user()->unreadNotifications->markAsRead();

        return view('notifications.index', [
            'notifications' => $notifications
        ]);
    }
}
