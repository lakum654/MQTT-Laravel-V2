<?php

namespace App\Http\Controllers;

use App\Mail\AssignedMapkMail;
use App\Models\Device;
use App\Models\GPSDevice;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class GPSDeviceController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->data = [
            'moduleName' => 'GPS Devices',
            'view'       => 'admin.gps-devices.',
            'routeName'  =>  'gps-device.index'
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(auth()->user());
        return view($this->data['view'] . 'index', $this->data);
    }
    public function getData()
    {
        $devices = GPSDevice::query();

        return DataTables::eloquent($devices)
            ->addColumn('action', function ($row) {
                $editUrl = route('gps-device.edit', encrypt($row->id));
                $trackUrl = route('track-device', ['qrcode' => $row->qrcode, 'id' => encrypt(auth()->user()->id)]);
                $actions = '';

                // if (auth()->user()->hasPermission('edit.users')) {
                // }
                $actions .= "<a href='" . $editUrl . "' class='btn btn-warning  btn-xs mr-1'><i class='fas fa-pencil-alt'></i> Edit</a>";
                $actions .= "<a href='" . $trackUrl . "' class='btn btn-info  btn-xs'><i class='fas fa-map'></i> Track</a>";
                return $actions;
            })

            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->data['view'] . 'form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'optional' => 'nullable'
        ];

        // Custom error messages (optional)
        $messages = [
            'name.required' => 'The name field is required.',
        ];

        // Validate the request
        $validatedData = $request->validate($rules, $messages);

        // If validation passes, the code below will execute
        // dd($validatedData);

        // Continue with the rest of your logic
        // Example: Create a new user
        $user = GPSDevice::create([
            'name' => $validatedData['name'],
            'optional' => $validatedData['optional'],
            'qrcode' => str_pad(rand(0, 9999999999999999), 16, '0', STR_PAD_LEFT),
            'created_by' => auth()->user()->id
        ]);

        return redirect(route($this->data['routeName']))->with('success', 'GPS Device created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $this->data['device'] = GPSDevice::find(decrypt($id));
        return view($this->data['view'] . '_form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'optional' => 'nullable'
        ]);


        $emailsJson = $request->emails; // This is the JSON-like string
        $emailsArray = json_decode($emailsJson, true); // Decode the JSON into an associative array

        // Extract the 'value' fields
        $emailValues = array_map(function ($item) {
            return $item['value'];
        }, $emailsArray);

        // Now $emailValues contains just the email addresses

        // Find the user by ID
        $device = GPSDevice::findOrFail($id);

        // Update user fields
        $device->name = $request->input('name');
        $device->optional = $request->input('optional');
        $device->qrcode = str_pad(rand(0, 9999999999999999), 16, '0', STR_PAD_LEFT);


        // Save the updated user
        $device->save();

        $this->sendTrackingLink($device, $emailValues);

        // Redirect back with a success message
        return redirect(route($this->data['routeName']))->with('message', 'GPS Device updated successfully!');
    }


    public function sendTrackingLink($device, $emails)
    {

        $device->emails = implode(',',$emails);
        $device->save();
        $details = [
            'user_name' => 'User',
            'tracking_link' => route('track-device', ['qrcode' => $device->qrcode, 'id' => encrypt(rand(1, 10))]),
        ];

        // Send email to all users at once
        Mail::to($emails)->send(new AssignedMapkMail($details));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function viewMap()
    {
    }

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
