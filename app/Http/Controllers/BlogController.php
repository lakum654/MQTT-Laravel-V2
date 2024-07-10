<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller {
    public $data = [];

    public function __construct() {
        $this->data = [
            'moduleName' => 'Blogs',
            'view' => 'admin.blogs.',
            'routeName' => 'blog.index'
        ];
    }

    public function index() {
        return view($this->data['view'] . 'index', $this->data);
    }

    public function getData() {
        $blogs = Blog::with('category');

        return DataTables::eloquent($blogs)
            ->addColumn('action', function ($blog) {
                $editUrl = route('blog.edit', encrypt($blog->id));
                $deleteUrl = route('blog.destroy', encrypt($blog->id));

                $actions = '';
                $actions .= "<a href='" . $editUrl . "' class='btn btn-warning btn-xs mr-2'><i class='fas fa-pencil-alt'></i> Edit</a>";
                $actions .= "<a href='" . $deleteUrl . "' class='btn btn-danger btn-xs'><i class='fas fa-pencil-alt'></i> Delete</a>";

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

    public function create() {
        $this->data['categories'] = Category::all();
        return view($this->data['view'] . 'form', $this->data);
    }

    public function store(Request $request) {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'desc' => 'required|string',
            'tags' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('blogs', 'public');
        }

        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->slug = \Str::slug($request->input('title'));
        $blog->image = $imagePath;
        $blog->desc = $request->input('desc');
        $blog->tags = $request->input('tags');
        $blog->category_id = $request->input('category_id');
        $blog->save();

        return redirect()->route('blog.index')->with('success', 'Blog created successfully.');
    }

    public function show($id) {
        $this->destroy($id);
        return back();
    }

    public function edit($id) {
        $this->data['categories'] = Category::all();
        $this->data['blog'] = Blog::find(decrypt($id));
        return view($this->data['view'] . '_form', $this->data);
    }

    public function update(Request $request, $id) {
        $blog = Blog::findOrFail($id);


        // dd($request->all());
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'image' => 'sometimes|image|max:2048',
            'desc' => 'required|string',
            'tags' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $image = $request->file('image');
            $imagePath = $image->store('blogs', 'public');
            $blog->image = $imagePath;
        }

        $blog->title = $request->input('title');
        $blog->slug = \Str::slug($request->input('title'));
        $blog->desc = $request->input('desc');
        $blog->tags = $request->input('tags');
        $blog->category_id = $request->input('category_id');
        $blog->save();

        return redirect()->route('blog.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id) {
        Blog::find(decrypt($id))->delete();
    }
}
