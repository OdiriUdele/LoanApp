<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Exception;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\Interfaces\UserRepositoryInterface;

use App\Http\Requests\UserDetailRequest;

class ProfileController extends Controller
{

    private $userRepository;

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd("yes");
        return view('profile.user_profile');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $user = $this->userRepository->findById($id);
        return view('profile.edit_user_profile');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UserDetailRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserDetailRequest $request, $id)
    {
        try{
            
            $usersDetails = $this->userRepository->updateDetail($request->all(), $id);

            return view('profile.edit_user_profile');
        }catch(Exception $e){
            return redirect()->back()->with('Error','Someting went wrong try Again!');
        }
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
