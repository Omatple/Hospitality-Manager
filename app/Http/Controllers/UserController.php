<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $userCollection = User::orderBy("name")->get();
        return view("users.index", compact("userCollection"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data["image"] = ($request->hasFile("image")) ? $request->file("image")->store("users/images") :
            "users/default.png";
        User::create($data);
        return redirect()->route("users.index")->with("message", "User added successly");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view("users.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();
        if ($request->password === null) unset($data["password"]);
        $oldImage = $user->image;
        $data["image"] = ($request->hasFile("image")) ?
            $request->file("image")->store("users/images") :
            $oldImage;
        if ($request->hasFile("image") && basename($oldImage) !== 'default.png' && Storage::exists($oldImage)) Storage::delete($oldImage);
        $user->update($data);
        return redirect()->route("users.index")->with("message", "User updated succesly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $userImage = $user->image;
        if (basename($userImage) !== 'default.png' && Storage::exists($userImage)) Storage::delete($userImage);
        $user->delete();
        return redirect()->route("users.index")->with("message", "User deleted succesly");
    }
}
