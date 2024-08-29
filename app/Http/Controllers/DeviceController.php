<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DeviceController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->data = [
            'moduleName' => 'Devices',
            'view'       => 'admin.devices.',
            'routeName'  =>  'device.index'
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
        $users = Device::query();

        return DataTables::eloquent($users)
        ->addColumn('action', function($user) {
            $editUrl = route('device.edit',encrypt($user->id));
            $actions = '';

            // if (auth()->user()->hasPermission('edit.users')) {
            // }
            $actions .= "<a href='".$editUrl."' class='btn btn-warning  btn-xs'><i class='fas fa-pencil-alt'></i> Edit</a>";
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
        $user = Device::create([
            'name' => $validatedData['name'],
            'qrcode' => str_pad(rand(0, 9999999999999999), 16, '0', STR_PAD_LEFT),
            'created_by' => auth()->user()->id
        ]);

        return redirect(route($this->data['routeName']))->with('success', 'Device created successfully.');
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

        $this->data['device'] = Device::find(decrypt($id));
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
            'name' => 'required|string|max:255'
        ]);

        // Find the user by ID
        $device = Device::findOrFail($id);

        // Update user fields
        $device->name = $request->input('name');
        $device->qrcode = str_pad(rand(0, 9999999999999999), 16, '0', STR_PAD_LEFT);

        // Save the updated user
        $device->save();

        // Redirect back with a success message
        return redirect(route($this->data['routeName']))->with('message', 'Device updated successfully!');
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
}
