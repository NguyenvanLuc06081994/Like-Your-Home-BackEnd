<?php
//
//namespace App\Http\Controllers\Api;
//
//use App\Http\Controllers\Controller;
//use App\User;
//use Illuminate\Http\Request;
//use Laravel\Socialite\Facades\Socialite;
//
//class SocialController extends Controller
//{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param \Illuminate\Http\Request $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param \Illuminate\Http\Request $request
//     * @param int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
//
//    public function redirect($provider)
//    {
//       return Socialite::driver($provider)->redirect();
//    }
//
//    public function callback($provider)
//    {
//
//        $getInfo = Socialite::driver($provider)->user();
//
//        $user = $this->createUser($getInfo, $provider);
//
//        auth()->login($user);
//
////        return redirect()->to('/home' );
//        return response()->json(1);
//    }
//
//    function createUser($getInfo, $provider)
//    {
//
//        $user = User::where('provider_id', $getInfo->id)->first();
//
//        if (!$user) {
//            $user = User::create([
//                'username' => $getInfo->name,
//                'email' => $getInfo->email,
//                'provider' => $provider,
//                'provider_id' => $getInfo->id
//            ]);
//        }
//        $user->save();
//    }
//}
