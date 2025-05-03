<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Models\Libary;
class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::all();
        return view('admin.collections.index', compact('collections'));
        
    }

    public function create()
{
    $libraries = Libary::all();  
    return view('admin.collections.create', compact('libraries')); 
}


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);

        $data = $request->only(['name', 'description']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('collections', 'public');
            $data['image'] = $imagePath;
        }

        Collection::create($data);

        return redirect()->route('admin.collections.index')->with('success', 'Bộ sưu tập đã được tạo.');
    }

    public function show(Collection $collection)
    {
        return view('admin.collections.show', compact('collection'));
    }

    public function edit(Collection $collection)
    {
        $libraries = Libary::all(); 
        return view('admin.collections.edit', compact('collection', 'libraries'));
    }
    
    
    

    public function update(Request $request, Collection $collection)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);

        $data = $request->only(['name', 'description']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('collections', 'public');
            $data['image'] = $imagePath;
        }

        $collection->update($data);

        return redirect()->route('admin.collections.index')->with('success', 'Đã cập nhật bộ sưu tập.');
    }

    public function destroy(Collection $collection)
    {
        $collection->delete(); 
    
        return redirect()->route('admin.collections.index')->with('success', 'Đã xóa bộ sưu tập.');
    }
    
}
