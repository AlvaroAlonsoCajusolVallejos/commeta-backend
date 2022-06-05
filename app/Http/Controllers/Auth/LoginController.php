<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller {

    public function __construct() {
        $this->middleware('guest', ['only' => 'showLoginForm']);
    }

    public function showLoginForm() {
        // var_dump(url()->current());exit();
        $url = "imagenes/personalizacion/loguito";
        $directorio = opendir($url);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                $loguito = $url . '/' . $archivo . '?x=' . rand(0, 99999);
            }
        }
        $url = "imagenes/personalizacion/fondo";
        $directorio = opendir($url);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                $fondo = $url . '/' . $archivo . '?x=' . rand(0, 99999);
            }
        }
        $url = "imagenes/personalizacion/company";
        $directorio = opendir($url);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                $img = $url . '/' . $archivo . '?x=' . rand(0, 99999);
            }
        }
        return view('login.principal')->with([
                    'loguito' => $loguito,
                    'fondo' => $fondo,
                    'img' => $img
                ]);
    }

    public function login(Request $request) {
        $email = $request->input("email");
        $request->request->add(['ndocumento' => $email]);
        $username = "email";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $username = "ndocumento";
        }
        $credentials = $this->validate($request, [
            $username => 'required|string',
            'password' => 'required|string',
        ]);
        if (Auth::attempt($credentials)) {
//            return redirect()->route('dashboard');
            return 200;
        }
        return 300;
//        return back()->withErrors([$this->username() => trans('auth.failed')])
//                        ->withInputs(request([$this->username()]));
    }

    public function logout() {
        Auth::logout();
        session()->flush();
//        return redirect('/');
        return 200;
    }

}
