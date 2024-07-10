<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->data = [
            'moduleName' => 'Galleries',
            'view'       => 'admin.gallery.',
            'routeName'  =>  'gallery.index'
        ];
    }

    public function index()
    {
        return view($this->data['view'] . 'index', $this->data);
    }

    public function getData()
    {
        // dd("hello");
        $galleries = Gallery::query();

        return DataTables::eloquent($galleries)
            ->addColumn('action', function ($gallery) {
                $editUrl = route('gallery.edit', encrypt($gallery->id));
                $deleteUrl = route('gallery.destroy', encrypt($gallery->id));

                $actions = '';
                $actions .= "<a href='" . $editUrl . "' class='btn btn-warning  btn-xs mr-2'><i class='fas fa-pencil-alt'></i> Edit</a>";
                $actions .= "<a href='" . $deleteUrl . "' class='btn btn-danger  btn-xs'><i class='fas fa-trash-alt'></i> Delete</a>";

                return $actions;
            })
            ->addColumn('image', function ($row) {
                $url = asset('storage/' . $row->image);
                return "<img src='" . $url . "' width='100px' height='100px'/>";
            })
            ->rawColumns(['action', 'image'])
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        return view($this->data['view'] . 'form', $this->data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|max:2048',
            'desc' => 'nullable|string|max:1000',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('galleries', 'public');
        }

        Gallery::create([
            'title' => $request->input('title'),
            'image' => $imagePath,
            'desc' => $request->input('desc'),
        ]);

        return redirect()->route('gallery.index')->with('success', 'Gallery created successfully.');
    }

    public function show($id) {
        $this->destroy($id);
        return back();
    }
    public function edit($id)
    {
        $this->data['gallery'] = Gallery::find(decrypt($id));
        return view($this->data['view'] . 'form', $this->data);
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'sometimes|image|max:2048',
            'desc' => 'nullable|string|max:1000',
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            $image = $request->file('image');
            $imagePath = $image->store('galleries', 'public');
            $gallery->image = $imagePath;
        }

        $gallery->title = $request->input('title');
        $gallery->desc = $request->input('desc');
        $gallery->save();

        return redirect()->route('gallery.index')->with('success', 'Gallery updated successfully.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::find(decrypt($id));
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }
        $gallery->delete();
    }
}
