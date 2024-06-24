<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->data = [
            'moduleName' => 'Users',
            'view'       => 'admin.users.',
            'routeName'  =>  'users.index'
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
        // dd('ddd');
        if(auth()->user()->role_id == 2) {
            $employeeIds = auth()->user()->employees()->pluck('user_id')->toArray();
            $users = User::with(['role','manager'])->whereIn('id',$employeeIds);
        } else {
            $users = User::with('role')->whereNotIn('role_id',[1])->where('id','!=',auth()->user()->id);
        }
        return DataTables::eloquent($users)
        ->addColumn('action', function($user) {
            $editUrl = route('users.edit',encrypt($user->id));
            $actions = '';

            // if (auth()->user()->hasPermission('edit.users')) {
            // }
            if(auth()->user()->hasRole(['super.admin','manegar'])) {
                $actions .= "<a href='".$editUrl."' class='btn btn-warning  btn-xs'><i class='fas fa-pencil-alt'></i> Edit</a>";
            }
            return $actions;
        })

        ->editColumn('created_by',function($row) {
            return $row->managers->first()?->name ?? '-';
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
        if(auth()->user()->role_id == 2) {
            $this->data['roles'] = Role::whereNotIn('id',[1,2])->get();
        } else {
            $this->data['roles'] = Role::whereNotIn('id',[1])->get();
        }
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
            'role_id' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];

        // Custom error messages (optional)
        $messages = [
            'role_id.required' => 'The role field is required.',
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already taken.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
        ];

        // Validate the request
        $validatedData = $request->validate($rules, $messages);

        // If validation passes, the code below will execute
        // dd($validatedData);

        // Continue with the rest of your logic
        // Example: Create a new user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role_id' => $validatedData['role_id'],
            'password' => bcrypt($validatedData['password']),
        ]);
        $user->roles()->sync([$request->role_id]);

        if(auth()->user()->role_id == 2 && $request->role_id == 3) {
            $oldEmpIds = auth()->user()->employees()->pluck('user_id')->toArray();
            $merged = array_merge([$user->id],$oldEmpIds);
            auth()->user()->employees()->sync($merged);
        }
        return redirect(route($this->data['routeName']))->with('success', 'User created successfully.');
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
        if(auth()->user()->role_id == 2) {
            $this->data['roles'] = Role::whereNotIn('id',[1,2])->get();
        } else {
            $this->data['roles'] = Role::whereNotIn('id',[1])->get();
        }

        $this->data['user'] = User::find(decrypt($id));
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
        'role_id' => 'required',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    // Find the user by ID
    $user = User::findOrFail($id);

    // Update user fields
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->role_id = $request->input('role_id');

    $user->roles()->sync([$request->role_id]);
    // Only update the password if it is provided
    if ($request->filled('password')) {
        $user->password = bcrypt($request->input('password'));
    }

    if (auth()->user()->role_id == 2 && $request->role_id == 3) {
        auth()->user()->employees()->syncWithoutDetaching([$user->id]);
    }

    // Save the updated user
    $user->save();

    // Redirect back with a success message
    return redirect(route($this->data['routeName']))->with('message', 'User updated successfully!');
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
