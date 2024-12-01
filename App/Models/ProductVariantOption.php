<?php

namespace App\Models;

class ProductVariantOption extends BaseModel
{
    protected $table = 'product_variant_options';
    protected $id = 'id';

    public function getAllProductVariantOption()
    {
        return $this->getAll();
    }
    public function getOneProductVariantOption($id)
    {
        return $this->getOne($id);
    }

    public function createProductVariantOption($data)
    {
        return $this->create($data);
    }
    public function updateProductVariantOption($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteProductVariantOption($id)
    {
        return $this->delete($id);
    }
    public function getOneProductVariantOptionByName($name)
    {
        return $this->getOneByName($name);
    }
}
