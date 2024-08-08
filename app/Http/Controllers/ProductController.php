<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        // Kirim data ke view 'dashboard.product.index'
        return view('dashboard.product.index', compact('products'));
    }
    public function productIndex()
    {
        $products = Product::all();

        // Mengirim data produk ke tampilan product_index.blade.php
        return view('dashboard.product.product_index', compact('products'));
    }
    public function productCreate()
    {
        return view('dashboard.product.product_add');
    }

    public function detailProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('dashboard.product.detail_product', compact('product'));
    }

    public function productStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|in:favorite,biasa',
            'description' => 'required|string',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|mimes:mp4,mov,avi|max:20480', // Sesuaikan maksimum sesuai kebutuhan Anda
        ]);

        DB::beginTransaction();

        try {
            // Simpan file gambar
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('public/images');
                $imagePaths[] = basename($imagePath);
            }

            // Simpan file video jika ada
            if ($request->hasFile('video')) {
                $videoPath = $request->file('video')->store('public/videos');
                $videoName = basename($videoPath);
            }

            // Simpan data produk ke database
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->category = $request->category;
            $product->description = $request->description;
            $product->images = json_encode($imagePaths); // Simpan array nama file gambar sebagai JSON string
            $product->video = isset($videoName) ? $videoName : null; // Simpan nama video jika ada
            $product->save();

            DB::commit();

            return redirect()->route('index')->with('success', 'Product added successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to add product. Please try again.');
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('dashboard.product.product_edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|in:favorite,biasa',
            'description' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|mimes:mp4,mov,avi|max:20480', // Sesuaikan maksimum sesuai kebutuhan Anda
        ]);

        DB::beginTransaction();

        try {
            // Ambil data produk yang akan diupdate
            $product = Product::findOrFail($id);

            // Hapus gambar lama jika ada gambar baru diupload
            if ($request->hasFile('images')) {
                // Hapus gambar lama dari folder public dan database
                $oldImages = json_decode($product->images, true);
                foreach ($oldImages as $oldImage) {
                    Storage::delete('public/images/' . $oldImage);
                }
                $product->images = null; // Reset data gambar di database untuk kemudian diupdate dengan yang baru
            }

            // Hapus video lama jika ada video baru diupload
            if ($request->hasFile('video')) {
                if ($product->video) {
                    Storage::delete('public/videos/' . $product->video);
                }
                $product->video = null; // Reset data video di database untuk kemudian diupdate dengan yang baru
            }

            // Simpan file gambar baru jika ada
            if ($request->hasFile('images')) {
                $imagePaths = [];
                foreach ($request->file('images') as $image) {
                    $imagePath = $image->store('public/images');
                    $imagePaths[] = basename($imagePath);
                }
                $product->images = json_encode($imagePaths); // Simpan array nama file gambar sebagai JSON string
            }

            // Simpan file video baru jika ada
            if ($request->hasFile('video')) {
                $videoPath = $request->file('video')->store('public/videos');
                $product->video = basename($videoPath); // Simpan nama file video
            }

            // Update data produk ke database
            $product->name = $request->name;
            $product->price = $request->price;
            $product->category = $request->category;
            $product->description = $request->description;
            $product->save();

            DB::commit();

            return redirect()->route('index')->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to update product. Please try again.');
        }
    }


    // Helper function to delete old product images
    private function deleteProductImages($imageNames)
    {
        foreach ($imageNames as $imageName) {
            Storage::delete('public/images/' . $imageName);
        }
    }


    public function destroy(Product $product)
    {
        // Hapus gambar dari storage jika ada
        if ($product->image) {
            Storage::delete('public/images/' . $product->image);
        }

        // Hapus video dari storage jika ada
        if ($product->video) {
            Storage::delete('public/videos/' . $product->video);
        }

        // Hapus data produk dari database
        $product->delete();

        return redirect()->route('index')->with('success', 'Product deleted successfully!');
    }
}
