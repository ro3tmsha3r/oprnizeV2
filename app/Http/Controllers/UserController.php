<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Blogcategory;
use App\Blogtag;
use App\Category;
use App\Role;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}