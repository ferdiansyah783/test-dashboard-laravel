<?php

namespace App\Repositories\Product;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductRepositoryImplement extends Eloquent implements ProductRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function findAll(Request $request)
    {
        return $this->model
            ->where('name', 'like', "%$request->search%")
            ->orWhere('description', 'like', "%$request->search%")
            ->orWhere('price', 'like', "%$request->search%")
            ->orWhere('stock', 'like', "%$request->search%")
            ->paginate(5);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $product = $this->find($id);
        return $product->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'stock' => $data['stock'],
            'image' => 'image'
        ]);
    }

    public function delete($id)
    {
        $this->model->find($id)->delete();
    }
}
