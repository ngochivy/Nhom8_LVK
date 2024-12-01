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



    public function getAllProductVariantName()
    {
        try {
            // Kết nối cơ sở dữ liệu
            $conn = $this->getConnection();

            // Truy vấn lấy tất cả sản phẩm và tên danh mục (JOIN với bảng categories)
            $stmt = $conn->prepare(
                "SELECT product_variants.*, products.name as product_name FROM `product_variants` INNER JOIN products ON product_variants.product_id = products.id;"
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
