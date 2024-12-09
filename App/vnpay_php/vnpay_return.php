<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VNPAY Response</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .header {
            border-bottom: 2px solid #007bff;
            margin-bottom: 20px;
            text-align: center;
        }
        .header h3 {
            color: #007bff;
            font-weight: bold;
        }
        .form-group label {
            font-weight: bold;
            color: #495057;
        }
        .form-group label:last-child {
            color: #212529;
            font-weight: normal;
        }
        .form-group span {
            font-weight: bold;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php
require_once("./config.php");

// Lấy SecureHash từ VNPAY
$vnp_SecureHash = $_GET['vnp_SecureHash'];

// Lấy các tham số bắt đầu bằng "vnp_"
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}

// Loại bỏ vnp_SecureHash khỏi dữ liệu tính toán
unset($inputData['vnp_SecureHash']);

// Sắp xếp theo thứ tự từ điển
ksort($inputData);

// Xây dựng chuỗi hash
$hashData = "";
foreach ($inputData as $key => $value) {
    $hashData .= $key . "=" . $value . "&";
}
$hashData = rtrim($hashData, "&"); // Loại bỏ ký tự & cuối

// Tính toán SecureHash
$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

?>
<div class="container">
    <div class="header">
        <h3>PHẢN HỒI VNPAY</h3>
    </div>
    <div class="table-responsive">
        <div class="form-group">
            <label>Mã đơn hàng:</label>
            <label><?php echo $_GET['vnp_TxnRef']; ?></label>
        </div>
        <div class="form-group">
            <label>Số tiền:</label>
            <label><?php echo number_format($_GET['vnp_Amount'] / 100); ?> VNĐ</label>
        </div>
        <div class="form-group">
            <label>Nội dung thanh toán:</label>
            <label><?php echo $_GET['vnp_OrderInfo']; ?></label>
        </div>
        <div class="form-group">
            <label>Mã phản hồi:</label>
            <label><?php echo $_GET['vnp_ResponseCode']; ?></label>
        </div>
        <div class="form-group">
            <label>Mã giao dịch tại VNPAY:</label>
            <label><?php echo $_GET['vnp_TransactionNo']; ?></label>
        </div>
        <div class="form-group">
            <label>Mã ngân hàng:</label>
            <label><?php echo $_GET['vnp_BankCode']; ?></label>
        </div>
        <div class="form-group">
            <label>Thời gian thanh toán:</label>
            <label><?php echo date("d/m/Y H:i:s", strtotime($_GET['vnp_PayDate'])); ?></label>
        </div>
        <div class="form-group">
            <label>Kết quả:</label>
            <label>
            <?php
                if ($secureHash === $vnp_SecureHash) {
                    if ($_GET['vnp_ResponseCode'] === '00') {
                        echo "<span style='color:red'>Giao dịch không thành công</span>";
                    } else {
                        echo "<span style='color:red'>Giao dịch không thành công</span>";
                    }
                } else {
                    echo "<span style='color:green'>Giao dịch thành công</span>";
                }
            ?>
            </label>
        </div>
    </div>
    <div class="text-center">
        <a href="/checkout" class="btn">Quay lại</a>
    </div>
</div>

</body>
</html>
