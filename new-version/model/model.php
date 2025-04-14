<?php
include '../config/app.php';

class Model
{

    public function DB()
    {
        return new Database();
    }

    /**
     * Thực thi một truy vấn SQL thuần túy
     * 
     * @param string $sql Câu truy vấn SQL || VD : $sql2 = "SELECT * FROM orders WHERE status = :status";
     * @param array $params Mảng các tham số (nếu có) || VD : $params2 = [':status' => 'pending'];
     * @return mixed Kết quả của truy vấn
     */
    public function sql(string $sql, array $params = [])
    {
        return $this->DB()->sql($sql, $params);
    }
}
