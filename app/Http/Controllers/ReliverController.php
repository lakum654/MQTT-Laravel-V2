<?php

namespace App\Http\Controllers;

use App\Models\Reliver;
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
        return view($this->data['view'] . 'index', $this->data);
    }

    public function getData()
    {
        $relivers = Reliver::query();

        return DataTables::eloquent($relivers)
            ->addColumn('action', function($reliver) {
                $editUrl = route('reliver.edit', encrypt($reliver->id));
                $actions = '';

                $actions .= "<a href='".$editUrl."' class='btn btn-warning btn-xs'><i class='fas fa-pencil-alt'></i> Edit</a>";
                return $actions;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        return view($this->data['view'] . 'form', $this->data);
    }

    public function store(Request $request)
    {
        $rules = [
            'junction_house_no' => 'required|string|max:255',
            'air_blaster_count' => 'required|string|max:255',
            'compressor' => 'required|string|max:255',
        ];

        $messages = [
            'junction_house_no.required' => 'The junction house no field is required.',
            'air_blaster_count.required' => 'The air blaster count field is required.',
            'compressor.required' => 'The compressor field is required.',
        ];

        $validatedData = $request->validate($rules, $messages);

        Reliver::create([
            'junction_house_no' => $validatedData['junction_house_no'],
            'air_blaster_count' => $validatedData['air_blaster_count'],
            'compressor' => $validatedData['compressor'],
            'qrcode' => str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT)
        ]);

        return redirect(route($this->data['routeName']))->with('success', 'Reliver created successfully.');
    }

    public function show($id)
    {
        $this->edit($id);
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
        ]);

        return redirect(route($this->data['routeName']))->with('message', 'Reliver updated successfully!');
    }

    public function destroy($id)
    {
        $reliver = Reliver::findOrFail($id);
        $reliver->delete();

        return redirect(route($this->data['routeName']))->with('message', 'Reliver deleted successfully!');
    }
}
