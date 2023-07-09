<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\LoginResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    // function for register
    public function register(){

    }

    // function to login
    public function login(LoginRequest $request){
        // =>> Langkah2 logika login <<==        // Langkah2 logika login
        // validate request
        // cek apakah email ada di database
        // jika ada maka cek password
        // jika password benar maka kirim token
        // jika salah kirim response error

        // -->> IMPLEMENTASI DENGAN LOGIKA YANG SUDAH MENGGUNAKAN CARA YG EFISIEN <<--
        // validate dengan Auth::attempt()
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            // jika login berhasil maka kirim token
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('token')->plainTextToken;
            return new LoginResource([
                'token' => $token,
                'user' => $user
            ]);
        }else{
            // jika gagal kirim response error
            return response([
                'message' => 'Bad Credentials'
            ], 404);
        }

    }

    // function to logout
    public function logout(Request $request){
        // hapus token yang dimiliki user
        // -> akan menghapus semua token yang dimiliki user, yang masih ada di database
        // $request->user()->tokens()->delete();
        // -> akan menghapus token yang dimiliki saat ini oleh user
        // $request->user()->currentAccessToken()->delete();
        // response no content
        return response()->noContent();
    }

}


