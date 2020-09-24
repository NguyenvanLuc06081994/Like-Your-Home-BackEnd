<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    private $user;
    private $auth;

    public function __construct(User $user,
                                \Tymon\JWTAuth\JWTAuth $auth)
    {
        $this->user = $user;
        $this->auth = $auth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($number)
    {
        return response([
            'user' => User::find($number)
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->address = $request->address;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->save();
        return response()->json([
            'status' => 200,
            'message' => 'Update successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }


    public function register(Request $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        if (!$request->hasFile('image')) {
            $user->image = 'https://i.stack.imgur.com/l60Hf.png' ;
        } else {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $newFileName = "$fileName";
            $request->file('image')->storeAs('public/images', $newFileName);
            $user->image = $newFileName;
        }
        $user->password = Hash::make($request->password);
        $user->save();


        return response()->json([
            'status' => 200,
            'message' => 'User created successfully',
            'data' => $user
        ]);

    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['invalid_email_or_password'], 422);
            }
        } catch (JWTException $e) {
            return response()->json(['failed_to_create_token'], 500);
        }
        $user = $this->auth->User();
        return response()->json(compact('token', 'user'));
    }

    public function change_password(Request $request, $id)
    {
        $input = $request->all();
        $userid = $id;
            try {
                if ((Hash::check(request('old_password'), Auth::user()->password)) == false) {
                    $arr = array("status" => 400, "message" => "Check your old password.", "data" => array());
                } else if ((Hash::check(request('new_password'), Auth::user()->password)) == true) {
                    $arr = array("status" => 400, "message" => "Please enter a password which is not similar then current password.", "data" => array());
                } else {
                    User::where('id', $userid)->update(['password' => Hash::make($input['new_password'])]);
                    $arr = array("status" => 200, "message" => "Password updated successfully.", "data" => array());
                }
            } catch (\Exception $ex) {
                if (isset($ex->errorInfo[2])) {
                    $msg = $ex->errorInfo[2];
                } else {
                    $msg = $ex->getMessage();
                }
                $arr = array("status" => 400, "message" => $msg, "data" => array());
            }

        return response()->json($arr);
    }

}
