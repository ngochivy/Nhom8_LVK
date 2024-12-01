<?php

namespace App\Models;

class ProductVariant extends BaseModel
{
    protected $table = 'product_variants';
    protected $id = 'id';

    public function getAllProductVariant()
    {
        return $this->getAll();
    }
    public function getOneProductVariant($id)
    {
        return $this->getOne($id);
    }

    public function createProductVariant($data)
    {
        return $this->create($data);
    }
    public function updateProductVariant($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteProductVariant($id)
    {
        return $this->delete($id);
    }
    public function getAllProductVariantByStatus()
    {
        return $this->getAllByStatus();
    }


    public function getOneProductVariantByName($name)
    {
        return $this->getOneByName($name);
    }
}
