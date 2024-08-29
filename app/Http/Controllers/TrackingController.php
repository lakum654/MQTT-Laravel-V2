<?php

namespace App\Http\Controllers;

use App\Mail\AssignedMapkMail;
use App\Models\GPSDevice;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TrackingController extends Controller
{
    public function startTracking($qrcode, $id)
    {
        try {
            $device = GPSDevice::where('qrcode', $qrcode)->first();
            if ($device) {
                return view('admin.gps-devices.tracking', compact('device'));
            } else {
                abort(403);
            }
        } catch (Exception $e) {
            abort(404);
        }
    }
}
