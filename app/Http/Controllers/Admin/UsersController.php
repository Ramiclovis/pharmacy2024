<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all(); // أو يمكنك استخدام طريقة أخرى لجلب البيانات مثل التصفية أو الترتيب
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {     
         

        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'status' => 'required|in:active,inactive',

        ]);
    
        // Create a new user instance
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->status = $validated['status'];
        $user->save();
    
        // Redirect to the correct route with success message
        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }
    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrfail($id);
        return view('admin.users.edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
 /**
 * Update the specified resource in storage.
 */
public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|string|min:8', // Password is optional without confirmation
        'status' => 'required|in:active,inactive', // Validate status as either 'active' or 'inactive'
    ]);

    // Find the user by ID or fail if not found
    $user = User::findOrFail($id);

    // Update user details
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->status = $request->input('status'); // Update user status

    // Update password only if it's provided
    if ($request->filled('password')) {
        $user->password = bcrypt($request->input('password')); // Hash the new password
    }

    // Save the changes
    $user->save();

    // Redirect back to the users list with a success message
    return redirect()->route('admin.users.index')->with('success', 'تم تحديث المستخدم بنجاح.');
}


    

    /**
     * Remove the specified resource from storage.
     */
  /**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{
    // Find the user by ID or fail if not found
    $user = User::findOrFail($id);

    // Delete the user
    $user->delete();

    // Redirect back to the users list with a success message
    return redirect()->route('admin.users.index')->with('success', 'تم حذف المستخدم بنجاح.');
}

}
