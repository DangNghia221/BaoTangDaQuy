<?php

namespace App\Http\Controllers;

use App\Models\Artifact;
use App\Models\Product;
use Illuminate\Http\Request;

class ArtifactController extends Controller
{
    public function index()
    {
        $artifacts = Artifact::with('product')->get(); // Load cả product
        return view('admin.artifacts.index', compact('artifacts'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.artifacts.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'description' => 'nullable|string',
            'product_id' => 'required|exists:products,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $product = Product::find($request->product_id); // Lấy tên khu trưng bày
    
        $data = $request->all();
        $data['location'] = $product ? $product->name : null; // Gán location
    
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('artifacts', 'public');
        }
    
        Artifact::create($data);
    
        return redirect()->route('artifacts.index')->with('success', 'Thêm hiện vật thành công!');
    }
    

    public function edit($id)
    {
        $artifact = Artifact::findOrFail($id);
        $products = Product::all();
        return view('admin.artifacts.edit', compact('artifact', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'description' => 'nullable|string',
            'product_id' => 'required|exists:products,id',
            'image' => 'nullable|image|max:2048',
        ]);
    
        $artifact = Artifact::findOrFail($id);
        $product = Product::find($request->product_id); // Lấy tên khu trưng bày
    
        $data = $request->all();
        $data['location'] = $product ? $product->name : null;
    
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('artifacts', 'public');
        }
    
        $artifact->update($data);
    
        return redirect()->route('artifacts.index')->with('success', 'Cập nhật hiện vật thành công!');
    }
    

    public function destroy($id)
    {
        $artifact = Artifact::findOrFail($id);
        $artifact->delete();
    
        return redirect()->route('artifacts.index')->with('success', 'Đã xoá hiện vật tạm thời!');
    }
    // Danh sách hiện vật đã xoá
public function trashed()
{
    $artifacts = Artifact::onlyTrashed()->with('product')->get();
    return view('admin.artifacts.trashed', compact('artifacts'));
}

// Khôi phục
public function restore($id)
{
    $artifact = Artifact::onlyTrashed()->findOrFail($id);
    $artifact->restore();

    return redirect()->route('artifacts.trashed')->with('success', 'Đã khôi phục hiện vật!');
}

// Xoá vĩnh viễn
public function forceDelete($id)
{
    $artifact = Artifact::onlyTrashed()->findOrFail($id);

    if ($artifact->image) {
        \Storage::disk('public')->delete($artifact->image);
    }

    $artifact->forceDelete();

    return redirect()->route('artifacts.trashed')->with('success', 'Đã xoá vĩnh viễn hiện vật!');
}
    
}
