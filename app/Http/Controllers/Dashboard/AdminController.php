<?php


namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
class AdminController extends Controller
{
    public function index()
	{
		return view('admin.home.index');
	}
}
