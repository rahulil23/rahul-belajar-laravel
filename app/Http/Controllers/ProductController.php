<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\view_data;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $limit = 4;

        $viewData = view_data::when($search, function ($query, $search) {
            $query->where('product_name', 'like', "%$search%")
                ->orWhere('category_name', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
        })
            ->simplepaginate($limit);

        return view('products.index', compact('viewData', 'search'));
    }

    public function delete($id)
    {
        $id = (int)$id;

        $deleted = DB::table('products')
            ->where('id', $id)
            ->delete();

        if ($deleted) {
            // Successful deletion
            return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
        } else {
            // Failed deletion
            return redirect()->route('products.index')->with('error', 'Failed to delete product.');
        }
    }

    public function createForm()
    {
        $categories = ProductCategory::all();  // Mengambil semua kategori dari database

        return view('products.create', compact('categories'));
    }
    public function create(Request $request)
    {
        // Validasi formulir
        $request->validate([
            'product_name' => 'required|string',
            'category_id' => 'required|integer',
            'product_code' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Proses data formulir
        $data = $request->only([
            'product_name',
            'category_id',
            'product_code',
            'description',
            'price',
        ]);

        // Menangani upload gambar
        $imagePaths = [];
        if ($request->hasFile('product_image')) {
            foreach ($request->file('product_image') as $image) {
                $imagePath = $image->store('uploads', 'public');
                $imagePaths[] = $imagePath;
            }
        }

        // Menambahkan path gambar ke data sebagai string
        $data['image'] = json_encode($imagePaths);

        // Membuat produk menggunakan model Eloquent
        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Produk berhasil dibuat.');
    }

    public function update(Request $request, $id)
    {
        // Validasi formulir
        $request->validate([
            'product_name' => 'required|string',
            'category_id' => 'required|integer',
            'product_code' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Proses data formulir
        $data = $request->only([
            'product_name',
            'category_id',
            'product_code',
            'description',
            'price',
        ]);
    
        // Menangani upload gambar
        $imagePaths = [];
        if ($request->hasFile('product_image')) {
            foreach ($request->file('product_image') as $image) {
                $imagePath = $image->store('uploads', 'public');
                $imagePaths[] = $imagePath;
            }
        }
    
        // Menambahkan path gambar ke data sebagai string
        $data['image'] = json_encode($imagePaths);
    
        // Mengupdate produk menggunakan model Eloquent
        $product = Product::find($id);
        $product->update($data);
    
        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate.');
    }

    public function editForm($id)
    {
        $product = Product::find($id);
        $categories = ProductCategory::all();
    
        return view('products.edit', compact('product', 'categories'));
    }

    // Other methods (create, update, delete) can be implemented similarly
}
