<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Collection;

class GalleryController extends Controller
{
    public function index()
    {
        $collections = Collection::all();
        return view('users.gallery.index', compact('collections'));
    }
}
