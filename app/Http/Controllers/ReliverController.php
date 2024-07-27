<?php

namespace App\Http\Controllers;

use App\Events\MQTTEvent;
use App\Models\NotificationSetting;
use App\Models\Reliver;
use App\Models\ReliverWork;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReliverController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->data = [
            'moduleName' => 'reliver',
            'view'       => 'admin.reliver.',
            'routeName'  =>  'reliver.index'
        ];
    }

    public function index()
    {

        if (in_array(auth()->user()->role_id, [4])) {
            return abort(403);
        }
        return view($this->data['view'] . 'index', $this->data);
    }

    public function getData()
    {

        $relivers = Reliver::with('device');
        if (auth()->user()->hasRole(['manegar'])) {
            $relivers = Reliver::with('device')->where('created_by', auth()->user()->id);
        } else if (auth()->user()->hasRole(['employee', 'user'])) {
            $userAssinedReliverIds = auth()->user()->relivers->pluck('id')->toArray();
            $relivers = Reliver::with('device')->whereIn('id', $userAssinedReliverIds);
        }

        return DataTables::eloquent($relivers)
            ->addColumn('action', function ($reliver) {
                $editUrl = route('reliver.edit', encrypt($reliver->id));
                $deleteUrl = route('reliver.delete', encrypt($reliver->id));
                $settingUrl = route('reliver.setting', encrypt($reliver->id));
                $viewUrl = route('reliver.show', encrypt($reliver->id));
                $actions = '';

                $actions = "<a href='" . $viewUrl . "' class='btn btn-success btn-xs mr-1'><i class='fas fa-eye'></i></a>";

                if (auth()->user()->hasRole(['super.admin', 'manegar'])) {
                    $actions .= "<a href='" . $editUrl . "' class='btn btn-warning btn-xs'><i class='fas fa-edit'></i></a>";
                }

                if (auth()->user()->hasRole(['super.admin'])) {
                    $actions .= "<a href='" . $deleteUrl . "' class='btn btn-danger btn-xs m-1'><i class='fas fa-trash-alt'></i></a>";
                }

                if (auth()->user()->hasRole(['super.admin']) || auth()->user()->hasRole(['manegar'])) {
                    $actions .= "<a href='" . $settingUrl . "' class='btn btn-info btn-xs m-1'><i class='fas fa-cog'></i></a>";
                }


                return $actions;
            })

            ->addColumn('device.name', function ($row) {
                $viewUrl = route('reliver.show', encrypt($row->id));
                return "<a href='" . $viewUrl . "'>{$row->device->name}</a>";
            })
            ->rawColumns(['action', 'device.name'])
            ->addIndexColumn()
            ->make(true);
    }

    public function create($device_id)
    {
        $this->data['device_id'] = $device_id;
        return view($this->data['view'] . 'form', $this->data);
    }

    public function store(Request $request)
    {
        $rules = [
            'junction_house_no' => 'required|string|max:255',
            'air_blaster_count' => 'required|string|max:255',
            'compressor' => 'required|string|max:255',
            'device_id' => 'required'
        ];

        $messages = [
            'junction_house_no.required' => 'The junction house no field is required.',
            'air_blaster_count.required' => 'The air blaster count field is required.',
            'compressor.required' => 'The compressor field is required.',
        ];

        $validatedData = $request->validate($rules, $messages);

        $reliverId = Reliver::create([
            'junction_house_no' => $validatedData['junction_house_no'],
            'air_blaster_count' => $validatedData['air_blaster_count'],
            'compressor' => $validatedData['compressor'],
            'qrcode' => str_pad(rand(0, 9999999999999999), 16, '0', STR_PAD_LEFT),
            'device_id' => $request->device_id,
            'map' => $request->map,
            'created_by' => auth()->user()->id
        ]);

        // Set Default Notifaction Value
        NotificationSetting::updateOrCreate(
            ['reliver_id' => $reliverId],
            [
                'pressure1' => 60,
                'pressure2' => 60,
                'pressure3' => 60,
                'radar1' => 60,
                'radar2' => 60,
                'blasterA1' => 60,
                'blasterB1' => 60,
                'blasterC2' => 60,
                'blasterD2' => 60,
                'temperature' => 60,
                'is_on' => 1
            ]
        );

        return redirect(route($this->data['routeName']))->with('success', 'Reliver created successfully.');
    }

    public function show($id)
    {
        $this->data['reliver_data'] = ReliverWork::where('reliver_id', decrypt($id))->get();
        $this->data['reliver'] = Reliver::find(decrypt($id));
        // dd($this->data);
        return view($this->data['view'] . 'view', $this->data);
    }

    public function getReliverApiData($id)
    {
        // dd($id);
        $data = ReliverWork::with('reliver')->where('reliver_id', $id);
        return DataTables::eloquent($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function edit($id)
    {
        $this->data['reliver'] = Reliver::find(decrypt($id));
        // dd($this->data);
        return view($this->data['view'] . '_form', $this->data);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'junction_house_no' => 'required|string|max:255',
            'air_blaster_count' => 'required|string|max:255',
            'compressor' => 'required|string|max:255',
        ];

        $validatedData = $request->validate($rules);

        $reliver = Reliver::findOrFail($id);

        $reliver->update([
            'junction_house_no' => $validatedData['junction_house_no'],
            'air_blaster_count' => $validatedData['air_blaster_count'],
            'compressor' => $validatedData['compressor'],
            'map' => $request->map
        ]);

        $reliver->users()->sync($request->employee_ids);
        return redirect(route($this->data['routeName']))->with('message', 'Reliver updated successfully!');
    }

    public function destroy($id)
    {
        $reliver = Reliver::findOrFail(decrypt($id));
        $reliver->delete();

        return redirect(route($this->data['routeName']))->with('message', 'Reliver deleted successfully!');
    }

    public function sendNotification(Request $request)
    {
        event(new MQTTEvent($request->message));
        return response()->json(['status' => 'Event triggered']);
    }

    public function setting($id)
    {
        $this->data['reliver'] = Reliver::find(decrypt($id));

        // dd($this->data['reliver']['setting']);
        return view($this->data['view'] . 'setting  ', $this->data);
    }

    public function updateSetting(Request $request) {


        // dd(Reliver::find($request->id)->setting);
        // dd($request->all());
        // Validate the request data
        $request->validate([
            'junction_house_no' => 'nullable|string|max:255',
            'pressure1' => 'nullable|numeric',
            'pressure2' => 'nullable|numeric',
            'pressure3' => 'nullable|numeric',
            'radar1' => 'nullable|numeric',
            'radar2' => 'nullable|numeric',
            'blasterA1' => 'nullable|numeric',
            'blasterB1' => 'nullable|numeric',
            'blasterC2' => 'nullable|numeric',
            'blasterD2' => 'nullable|numeric',
            'temperature' => 'nullable|numeric',
            'is_on' => 'nullable|boolean',
        ]);

        // Encrypt the reliver ID for use in the redirect
        $reliverId = $request->input('reliver_id');

        // Update or create the notification setting
        NotificationSetting::updateOrCreate(
            ['reliver_id' => $reliverId],
            [
                'pressure1' => $request->input('pressure1'),
                'pressure2' => $request->input('pressure2'),
                'pressure3' => $request->input('pressure3'),
                'radar1' => $request->input('radar1'),
                'radar2' => $request->input('radar2'),
                'blasterA1' => $request->input('blasterA1'),
                'blasterB1' => $request->input('blasterB1'),
                'blasterC2' => $request->input('blasterC2'),
                'blasterD2' => $request->input('blasterD2'),
                'temperature' => $request->input('temperature'),
                'is_on' => $request->has('is_on') ? 1 : 0
            ]
        );

        // Redirect back with success message
        return back();
    }
}
