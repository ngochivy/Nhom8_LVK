<?php

namespace App\Models;

use App\Models\BaseModel;

class SKU extends BaseModel
{
    public function getConnection()
    {
        return $this->_conn->MySQLi(); // Giả sử _conn là đối tượng kết nối của bạn.
    }

    /**
     * Lấy SKU với các tùy chọn biến thể dựa trên ID
     *
     * @param int $id ID của SKU
     * @return array|null Mảng chứa thông tin SKU hoặc null nếu không tìm thấy
     */
    public function getSKUWithVariantsById($id)
    {
        // Kết nối cơ sở dữ liệu
        $conn = $this->getConnection();

        // Kiểm tra kết nối cơ sở dữ liệu
        if ($conn === null) {
            throw new \Exception("Không thể kết nối cơ sở dữ liệu.");
        }

        // Câu lệnh SQL để lấy SKU và tùy chọn biến thể
        $sql = "SELECT s.*, 
                       GROUP_CONCAT(CONCAT(pv.name, ':', pvo.name) SEPARATOR '|') as variant_options
                FROM skus s
                JOIN product_variant_options pvo ON s.product_variant_option_id = pvo.id
                JOIN product_variants pv ON pvo.product_variant_id = pv.id
                WHERE s.id = ?
                GROUP BY s.id";

        // Chuẩn bị và thực thi truy vấn
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $id); // Liên kết tham số ID kiểu integer
            $stmt->execute();

            // Lấy kết quả truy vấn
            $result = $stmt->get_result()->fetch_assoc();

            if ($result) {
                // Xử lý dữ liệu variant_options
                $result['variant_options'] = array_map(function($option) {
                    list($variant, $value) = explode(':', $option);
                    return [
                        'variant_name' => $variant, 
                        'option_name' => $value
                    ];
                }, explode('|', $result['variant_options']));
                
                return $result;
            } else {
                return null; // Trả về null nếu không tìm thấy SKU
            }
        } else {
            throw new \Exception("Lỗi trong quá trình thực thi truy vấn.");
        }
    }
}
