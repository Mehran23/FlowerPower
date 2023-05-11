<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeProfileController extends Controller
{
    public function edit()
    {
        // Je kunt hier de view retourneren waar de medewerker zijn/haar profiel kan bewerken
        return view('employee.profile.edit');
    }
}
