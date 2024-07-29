<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Service;
use App\Models\User;
use App\Models\UserVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            'auth',
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalUser = User::count();
        $totalService = Service::count();
        $totalComplaint = Complaint::count();
        $roles = Role::all();
        $users = User::all();

        return view('pages.backsite.user.index', compact('totalUser', 'totalService', 'totalComplaint', 'roles', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $password = Str::random(8);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
        ]);

        RoleUser::create([
            'user_id' => $user->id,
            'role_id' => $request->role_id,
        ]);

        UserVerification::create([
            'user_id' => $user->id,
        ]);

        alert()->success('Pesan Sukses', 'Data User berhasil ditambahkan');
        return redirect()->route('backsite.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $totalUser = User::count();
        $totalService = Service::count();
        $totalComplaint = Complaint::count();
        $roles = Role::all();
        $userVerifications = UserVerification::all();
        $user = User::find($id);
        return view('pages.backsite.user.edit', compact('totalUser', 'totalService', 'totalComplaint', 'roles', 'userVerifications', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $roleUser = $user->role_user;
        $roleUser->update([
            'role_id' => $request->role_id,
        ]);

        $verification = $user->verification;
        $verification->update([
            'is_verified' => $request->is_verified,
        ]);

        alert()->success('Pesan Sukses', 'Data User berhasil diupdate');
        return redirect()->route('backsite.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        abort(404);
    }
}
