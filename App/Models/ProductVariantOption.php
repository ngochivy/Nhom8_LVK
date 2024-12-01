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




    public function getAllProductVariantOptionName()
    {
        try {
            // Kết nối cơ sở dữ liệu
            $conn = $this->getConnection();

            // Truy vấn lấy tất cả sản phẩm và tên danh mục (JOIN với bảng categories)
            $stmt = $conn->prepare(
                "SELECT product_variant_options.*, product_variants.name as product_variant_name FROM `product_variant_options` INNER JOIN product_variants ON product_variant_options.product_variant_id = product_variants.id;"
            );
            $stmt->execute();

            // Lấy kết quả
            $result = $stmt->get_result();
            return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        } catch (\Throwable $th) {
            // Xử lý lỗi và ghi lại lỗi nếu có
            error_log("Error in getAllProductWithCategoryName(): " . $th->getMessage());
            return [];
        }
    }
}
