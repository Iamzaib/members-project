<?php

namespace App\Observers;

use App\Models\Member;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class MemberActionObserver
{
    public function created(Member $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Member'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Member $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Member'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Member $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Member'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
