<?php

namespace App\Http\Controllers;

use App\Models\auction;
use App\Models\category;
use App\Models\Notification;
use App\Models\State;
use App\Models\User;
use App\Models\VehicleType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $notifications = Notification::where('to_user_id', Auth::user()->id)->where('is_seen', -1)->get();
            return response($notifications);
        } catch (\Throwable $error) {
            throw $error->getMessage();
        }
    }

    public function clear()
    {
        try {
            $notifications = Notification::where('is_seen', -1)->where('to_user_id', Auth::id())->get();
            foreach ($notifications as $notification) {
                $notification->is_seen = 1;
                $notification->update();
            }
            return back()->with(['success', " تمة عملية تنظيف الاشعارات"]);
        } catch (\Throwable $th) {
            return back()->with(['error', "لم تتم عملية تنظيف الاشعارات"]);
        }
    }

    /**
     * @param mixed $notificationId
     *
     * this function used for make notification seen
     * @return [type]
     */
    public function makeNotificationSeen($notificationId)
    {
        try {
            $notification = Notification::find($notificationId);
            $notification->is_seen = 1;
            $notification->update();
            $route = explode('/', $notification->route);
            $parameter = null;
            if($notification->type == 5){
                return redirect($notification->route);
            }
            if (count($route) == 1)
                return redirect()->route($notification->route);
            else {
                $name = $route[0];
                array_shift($route);
                $parameter = $route;
                return redirect()->route($name, $parameter);
            }
        } catch (\Throwable $error) {
            return view('error.error');
        }
    }

    public static function sendNotificationToAdmin($content, $route, $type = 0)
    {
        try {
            $notification = new Notification();
            $admin = User::where('role', 0)->first();
            $notification->from_user_id = Auth::user()->id;
            $notification->to_user_id = $admin->id;
            $notification->content = $content;
            $notification->route = $route;
            $notification->type = $type;
            $notification->save();
        } catch (\Throwable $error) {
            // throw $error->getMessage();
            return view('error.error');
        }
    }

    /**
     *
     * this function used to sent notification to user
     *
     * @param mixed $fromUserId
     * @param mixed $toUserId
     * @param mixed $content
     * @param mixed $route
     *
     * @return boolean
     *
     */
    public static function sendNotification($toUserId, $content, $route, $type = 0)
    {
        try {
            $notification = new Notification();
            $notification->from_user_id = Auth::user()->id;
            $notification->to_user_id = $toUserId;
            $notification->content = $content;
            $notification->route = $route;
            $notification->type = $type;
            $notification->save();
        } catch (\Throwable $error) {
            // throw $error->getMessage();
            return view('error.error');
        }
    }
    /**
     * [This function used to send notfication from admin to user]
     *
     * @param mixed $toUserId
     * @param mixed $content
     * @param mixed $route
     *
     * @return [boolean]
     *
     */
    public static function sendNotificationFromAdmin($toUserId, $content, $route, $type = 0)
    {
        try {
            $notification = new Notification();
            $admin = User::where('role', 0)->first();
            $notification->from_user_id = $admin->id;
            $notification->to_user_id = $toUserId;
            $notification->content = $content;
            $notification->route = $route;
            $notification->type = $type;
            $notification->save();
            return $notification;
        } catch (\Throwable $th) {
            // throw $error->getMessage();
            return view('error.error');
        }
    }
}
