<?php

namespace App\Http\Controllers;

use App\Permisos\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('haveaccess', 'user.index');
        $users = User::with('roles')->orderBy('id', 'Desc')->paginate(2);

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', [$user, ['user.show', 'userown.show']]);
        $roles = Role::orderBy('name')->get();
        $roleId = DB::select('select role_id from role_user where user_id = ?', [Auth::user()->id]);

        return view('user.view', compact('roles', 'user', 'roleId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', [$user, ['user.edit', 'userown.edit']]);
        $roles = Role::orderBy('name')->get();
        $roleId = DB::select('select role_id from role_user where user_id = ?', [Auth::user()->id]);

        return view('user.edit', compact('roles', 'user', 'roleId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:50|unique:users,name,'.$user->id,
            'email' => 'required|max:50|unique:users,email,'.$user->id
        ]);

        $user->update($request->all());

        $user->roles()->sync($request->get('roles'));

        if(Auth::user()->id == 1){
            return redirect()->route('user.index')->with('status_success', 'User update successfully');
        }else{
            return redirect()->route('user.show', Auth::user()->id)->with('status_success', 'User update successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('haveaccess', 'user.destroy');
        $user->delete();

        return redirect()->route('user.index')->with('status_success', 'User successfully removed');
    }
}
