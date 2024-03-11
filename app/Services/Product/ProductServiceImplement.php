<?php

namespace App\Services\Product;

use LaravelEasyRepository\Service;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class ProductServiceImplement extends Service implements ProductService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(ProductRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function findAll(Request $request)
    {
        return $this->mainRepository->findAll($request);
    }

    public function update($id, $data)
    {
        return $this->mainRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->mainRepository->delete($id);
    }
}
