<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserProfileRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use function compact;
use function public_path;
use function view;

class UserProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $user = User::findorFail(Auth::id());
        return view("user_profile.edit", compact("user"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserProfileRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(StoreUserProfileRequest $request)
    {
        $user = $validated = $request->validated();
//        dd($user);
        if (isset($user['profile_url'])) {
            $fileName = time() . '.' . $request->profile_url->extension();
            $upload_path = public_path('assets/image/user/' . Auth::id() . '/');
            $request->profile_url->move($upload_path, $fileName);
            $user["profile_url"] = 'assets/image/user/' . Auth::id() . '/' . $fileName;
        }
        User::where("id", Auth::id())->update($user);
        return redirect(route('dashboard'))->with('message', 'User profile updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
