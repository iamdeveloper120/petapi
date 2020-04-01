<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\ApiResponseTrait;
use Carbon\Carbon;
use Laravel\Passport\Passport;

class AuthController extends Controller
{
    use ApiResponseTrait;
    public $successStatus = 200;
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['userData'] = $user;
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $this->data = $success;
            return $this->sendResponse();
        }
        else{
            $this->status = $this->status401;
            $this->message = 'Unauthorised';
            return $this->sendResponse();
        }
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            $this->message = 'error';
            $this->status = 404;
            $this->data = $validator->errors();
            return $this->sendResponse();
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;
        $this->status = $this->status201;
        $this->data = $success;
        return $this->sendResponse();
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        $this->data = $user;
        return $this->sendResponse();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $user = Auth::user();
        foreach ($user->tokens as $token) {
            $token->revoke();
        }
        $this->message = 'You have been succesfully logged out!';
        $this->status = $this->status200;
        return $this->sendResponse();
    }
}
