<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->data = [
            'moduleName' => 'Products',
            'view'       => 'admin.products.',
            'routeName'  =>  'products.index'
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
        $users = Product::query();

        return DataTables::eloquent($users)
            ->addColumn('action', function ($user) {
                $editUrl = route('products.edit', encrypt($user->id));
                $deleteUrl = route('products.destroy', encrypt($user->id));

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
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'price' => 'required|numeric|min:0',
            'desc' => 'required|string',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('products', 'public');
        }

        // Create a new device
        $product = new Product();
        $product->name = $request->input('name');
        $product->image = $imagePath;
        $product->price = $request->input('price');
        $product->desc = $request->input('desc');
        $product->qrcode = str_pad(rand(0, 9999999999999999), 16, '0', STR_PAD_LEFT);
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
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
        $this->data['product'] = Product::find(decrypt($id));

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
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'price' => 'required|numeric|min:0',
            'desc' => 'required|string',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image) {
                Storage::disk('public')->delete('products/' . $product->image);
            }
            $image = $request->file('image');
            $imagePath = $image->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->desc = $request->input('desc');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find(decrypt($id))->delete();
    }
}
