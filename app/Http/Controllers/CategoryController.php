<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->data = [
            'moduleName' => 'Categories',
            'view'       => 'admin.category.',
            'routeName'  => 'categories.index'
        ];
    }

    public function index()
    {
        return view($this->data['view'] . 'index', $this->data);
    }

    public function getData()
    {
        $categories = Category::query();

        return DataTables::eloquent($categories)
        ->addColumn('action', function($category) {
            $editUrl = route('categories.edit', encrypt($category->id));
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
            'name' => 'required|string|max:255',
        ];

        $messages = [
            'name.required' => 'The name field is required.',
        ];

        $validatedData = $request->validate($rules, $messages);

        Category::create([
            'name' => $validatedData['name'],
        ]);

        return redirect(route($this->data['routeName']))->with('success', 'Category created successfully.');
    }

    public function show($id)
    {
        $this->edit($id);
    }

    public function edit($id)
    {
        $this->data['category'] = Category::find(decrypt($id));
        return view($this->data['view'] . '_form', $this->data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect(route($this->data['routeName']))->with('message', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        Category::find(decrypt($id))->delete();
        return redirect(route($this->data['routeName']))->with('message', 'Category deleted successfully!');
    }
}
