<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libary;
use Illuminate\Support\Facades\Storage;

class LibaryController extends Controller
{
    public function index()
    {
        $libaries = Libary::latest()->get();
        return view('admin.libary.index', compact('libaries'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('uploads/libary', 'public');

            $libary = new Libary();
            $libary->filename = $file->getClientOriginalName();
            $libary->path = $path;
            $libary->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }

    public function destroy($id)
    {
        $libary = Libary::findOrFail($id);
        Storage::disk('public')->delete($libary->path);
        $libary->delete();

        return redirect()->back()->with('success', 'Đã xóa thành công');
    }
}
