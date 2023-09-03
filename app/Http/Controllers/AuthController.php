<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }
    $request->session()->regenerate();
    }


    public function logout(Request $request)
        {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        }

    public function register(Request $request){
      $validator=Validator::make($request->all(),[
        'name'=>'required|string|between:2,100',
        'email'=>'required|string|max:100|unique:users',
        'password'=>'required|string|min:6',
        'role_id' => 'required|exists:roles,id', // Validate the selected role exists in the roles table
    ]);

    if($validator->fails()){
        return response()->json([
            'status'=>401,
            'message'=>$validator->errors()->all()
        ],401);
    }else{
      $user=User::create(array_merge(
        $validator->validated(),
        ['password' => bcrypt($request->password)]
      ));

      // Attach the selected role to the user
    //   $user->roles()->attach($request->id_role);
      
    }
               
    if($user){
      return response()->json([
          'status'=>200,
          'message'=>'User created successfully',
      ],200);
    }else{
        return response()->json([
            'status'=>500,
            'message'=>'Something went wrong'
        ],500);
    }
    }

        public function me(Request $request)
        {
          return response()->json([
            'data' => $request->user(),
          ]);
        }

        public function index()
        {
            // $user=User::all();
            $user = User::with('role')->get(); // Eager load the role relationship
            if($user->count()>0){
                return response()->json([
                    'status'=>200,
                    'message'=>$user
    
                ],200);
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'No records Found'
                ],404);
            }
        }

        public function create(Request $request)
        {

        }

        public function store(Request $request)
        {
          $validator=Validator::make($request->all(),[
              'name'=>'required|string|max:191',
              'email'=>'required|string|max:191',
              'password'=>'required|string|max:191',
          ]);
  
          if($validator->fails()){
              return response()->json([
                  'status'=>422,
                  'message'=>$validator->messages()
              ],422);
          }else{
            $user=User::create([
              'name'=>$request->name,
              'email'=>$request->email,
              'password'=>$request->password,
            ]);

              
            if($user){
              return response()->json([
                  'status'=>200,
                  'message'=>'User created successfully',
              ],200);
          }else{
              return response()->json([
                  'status'=>500,
                  'message'=>'Something went wrong'
              ],500);
          }
          }

        }
        public function edit($id)
        {
            $user=User::find($id);
    
            if($user){
                return response()->json([
                    'status'=>200,
                    'message'=>$user
                ],200);
            }else {
                return response()->json([
                    'status'=>404,
                    'message'=>'No such user found!'
                ],404);
            }
        }

        public function update(Request $request, int $id)
        {
            $validator=Validator::make($request->all(),[
                'name'=>'required|string|max:191',
                'email'=>'required|string|max:191',
                'password'=>'required|string|max:191',
                'role_id'=>'required',
            ]);
    
            if($validator->fails()){
                return response()->json([
                    'status'=>422,
                    'message'=>$validator->messages()
                ],422);
            }else{
                $user=User::find($id);
                
    
                if($user){
    
                    $user->update([
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'password'=>$request->password,
                        'role_id'=>$request->role_id,
              
                    ]);
    
                    return response()->json([
                        'status'=>200,
                        'message'=>'User updated successfully',
                    ],200);
                }else{
                    return response()->json([
                        'status'=>404,
                        'message'=>'No Such User Found!'
                    ],404);
                }
            }
        }
    
        /**
         * Remove the specified resource from storage.
         */
        public function destroy( $id)
        {
            $user=User::find($id);
            if($user){
                $user->delete();
                return response()->json([
                    'status'=>200,
                    'message'=>'User deleted successfully!'
                ],200);
    
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'No Such User Found!'
                ],404);
            }
        }
}
