<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->all();

        return view('frontstore.home', compact('products'));
    }

    public function backstore(Request $request)
    {
        $user = $request->user();

        if (Gate::denies('viewBackstore', $user)) {
            abort(403, 'Unauthorized action.');
        }

        $products = $this->productService->findAll($request, $user->id);

        return view('backstore.home', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        $data = $request->all();
        $data['image'] = '/image';
        $data['user_id'] = auth()->user()->id;

        $this->productService->create($data);

        return redirect()->route('backstore')->with('success', 'Product created successfully.');
    }

    public function update(Request $request, int $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        $this->productService->update($product, $request->all());

        return redirect()->route('backstore')->with('success', 'Product updated successfully.');
    }

    public function destroy(int $product)
    {
        $this->productService->delete($product);

        return redirect()->route('backstore')->with('success', 'Product deleted successfully.');
    }
}
