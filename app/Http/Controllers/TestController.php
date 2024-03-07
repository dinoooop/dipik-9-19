<?php

namespace App\Http\Controllers;

use App\Helpers\Dback;
use App\Models\Option;
use App\Models\Tag;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function test(Request $request)
    {
        // 2023-11-25 06:33:45
        $blog = Blog::find(1);
        $blog->created_at = '2024-03-01 08:32:17';
        $blog->save();
    }
}
