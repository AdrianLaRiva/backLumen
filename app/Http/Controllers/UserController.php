<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getUser(Request $request)
    {
        if ($request->isJson()) {
            try {
                $data = $request->json()->all()["data"];
            
                $user = User::where('email', $data['email'])->first();
                $user->loged = true;
                $user->save();

                if ($user && Hash::check($data['password'], $user->password)) {
                    return response()->json($user, 200);
                } else {
                    return response()->json(['error' => 'No content'], 406);
                }
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }
    
     public function logOut(Request $request)
    {
        if ($request->isJson()) {
           
           $api_token = $request->header('Authorization');
           $user = User::where('api_token',$api_token)->first();
           $user->loged = false;
           $user->save();
           
           return response()->json("logout",200); 
        }
    }

}
