<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ClientController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->data = [
            'moduleName' => 'Clients',
            'view'       => 'admin.clients.',
            'routeName'  =>  'client.index'
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
        $users = Client::query();

        return DataTables::eloquent($users)
            ->addColumn('action', function ($user) {
                $editUrl = route('client.edit', encrypt($user->id));
                $deleteUrl = route('client.destroy', encrypt($user->id));

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
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|max:2048',
            'desc' => 'nullable|string|max:1000',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('clients', 'public');
        }

        // Create a new device
        $client = new Client();
        $client->title = $request->input('title');
        $client->image = $imagePath;
        $client->desc = $request->input('desc');
        $client->save();

        return redirect()->route('client.index')->with('success', 'client created successfully.');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd(decrypt($id));
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
        $this->data['client'] = Client::find(decrypt($id));

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
        $client = Client::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'sometimes|image|max:2048',
            'desc' => 'nullable|string|max:1000',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($client->image) {
                Storage::disk('public')->delete('clients/' . $client->image);
            }
            $image = $request->file('image');
            $imagePath = $image->store('clients', 'public');
            $client->image = $imagePath;
        }

        $client->title = $request->input('title');
        $client->desc = $request->input('desc');
        $client->save();

        return redirect()->route('client.index')->with('success', 'Client updated successfully.');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::find(decrypt($id))->delete();
    }
}
