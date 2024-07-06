<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->data = [
            'moduleName' => 'Services',
            'view'       => 'admin.services.',
            'routeName'  =>  'service.index'
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
        $users = Service::query();

        return DataTables::eloquent($users)
            ->addColumn('action', function ($user) {
                $editUrl = route('service.edit', encrypt($user->id));
                $deleteUrl = route('service.destroy', encrypt($user->id));

                $actions = '';

                $actions .= "<a href='" . $editUrl . "' class='btn btn-warning  btn-xs mr-2'><i class='fas fa-pencil-alt'></i> Edit</a>";
                $actions .= "<a href='" . $deleteUrl . "' class='btn btn-danger  btn-xs'><i class='fas fa-pencil-alt'></i> Delete</a>";

                return $actions;
            })

            ->addColumn('image', function ($row) {
                $url = asset('storage/' . $row->image);
                return "<img src=" . $url . " width='100px' height='100px'/>";
            })

            ->rawColumns(['action', 'image'])
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
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'price' => 'required|numeric|min:0',
            'desc' => 'required|string',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('services', 'public');
        }

        // Create a new device
        $service = new Service();
        $service->name = $request->input('name');
        $service->image = $imagePath;
        $service->price = $request->input('price');
        $service->desc = $request->input('desc');
        $service->save();

        return redirect()->route('service.index')->with('success', 'service created successfully.');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $this->destroy($id);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd("Hello");
        // dd(decrypt($id));
        $this->data['service'] = Service::find(decrypt($id));

        // dd($this->data['view'] . '_form');
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
        $service = Service::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'price' => 'required|numeric|min:0',
            'desc' => 'required|string',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($service->image) {
                Storage::disk('public')->delete('services/' . $service->image);
            }
            $image = $request->file('image');
            $imagePath = $image->store('services', 'public');
            $service->image = $imagePath;
        }

        $service->name = $request->input('name');
        $service->price = $request->input('price');
        $service->desc = $request->input('desc');
        $service->save();

        return redirect()->route('service.index')->with('success', 'Product updated successfully.');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::find(decrypt($id))->delete();
    }
}
