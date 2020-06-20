<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use DataTables;
use App\Services\UserService;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function datatable(UserService $service)
    {
        $users = $service->index();

        return Datatables::of($users)
            ->addColumn("action", function($users) {
                return '<a href="'.route('user.edit',$users->id) .'" class="btn btn-sm btn-warning">Edit</a> <form action="'. route('user.destroy',$users->id) .'" method="post" class="d-inline"> <input type="hidden" name="_method" value="delete"> <input type="hidden" name="_token" value="'.csrf_token().'">  <button class="btn btn-sm btn-danger">Hapus</button></form>';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        return view('admin.user.edit', compact('user'));
    }

    public function update(UserRequest $request, UserService $service, $id)
    {
        $user = User::findOrFail($id);

        // $data = $request->except('password_confirmation');
        $data = $service->update($request->except('password_confirmation'), $user);

        // $data['password'] = ($request->password) ? Hash::make($request->password) : $user->password;

        // $user->update($data);

        return redirect()->route('user.index');
    }

    public function destroy(UserService $service, $id)
    {
        $user = User::findOrFail($id);

        $service->destroy($user);

        return redirect()->route('user.index');
    }
}
