<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class AuthEmployeeLoginController extends Controller
{
    public function showLoginForm()
    {
        return view("employee.login");
    }

    public function login(Request $request)
    {
        // Valideer de inloggegevens
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:8",
        ]);


        // Probeer de medewerker te authenticeren
        if (
            Auth::guard('employee')->attempt([
                "email" => $request->email,
                "password" => $request->password,
            ])
        ) {

            // Als de authenticatie slaagt, redirect naar het medewerkers dashboard
            return redirect()->intended(route("employee.dashboard"));
        }

        // Als de authenticatie mislukt, redirect terug naar het inlogformulier met een foutmelding
        return redirect()
            ->back()
            ->withInput($request->only("email"))
            ->withErrors([
                "email" =>
                    "De opgegeven inloggegevens zijn onjuist of u bent geen medewerker.",
            ]);
    }
    public function logout(Request $request)
    {
        Auth::guard('employee')->logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('employee.login');
    }
}