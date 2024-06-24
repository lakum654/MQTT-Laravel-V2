<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Reliver;
use App\Models\User;
use Illuminate\Http\Request;
use PhpMqtt\Client\Facades\MQTT;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $mqtt = MQTT::connection();
        // MQTT::publish('lakum/home/fan', 'on');
        // dd(auth()->user()->isEditor());
        $data['totalEmp'] = User::where('role_id',3)->count();
        $data['totalDevice'] = User::where('role_id',3)->count();
        $data['devices'] = Device::all();
        $data['totalRel'] = Reliver::count();
        $data['totalUsers'] = User::count();

        return view('home',$data);
    }
}
