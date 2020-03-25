<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Render student landing page
     * @return view
     */
    public function index() {
        return view('student.home');
    }
}
