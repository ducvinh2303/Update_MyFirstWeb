
<?php

class Database
{

    public function connections()
    {
        $servername = "127.0.0.1"; // Server || Localhost (127.0.0.1)
        $dbname = "kit202_group_09"; // Database name
        $username = "root"; // User
        $password = ""; // password

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            return $conn;
        } catch (PDOException $e) {
            echo "Lỗi kết nối dữ liệu thất bại !!";
            exit();
        }
    }

    /**
     * 
     * @param string $table
     * @param array $datainput
     * @param array|null $TIMESTAMP
     * @return bool|int Trả về ID cuối cùng được chèn
     */
    public function create(string $table, array $datainput, array $TIMESTAMP = null)
    {
        $conn = $this->connections(); // connection to database
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $attributes = array();
        $data = array();
        $placeholders = array();

        foreach ($datainput as $key => $value) {
            $attributes[$key] = $key;
            $placeholders[$key] = ":" . $key;
            $data[":" . $key] = $value;
        }

        $columns = implode(',', $attributes);
        $params = implode(',', $placeholders);

        $sql = "INSERT INTO $table ($columns) VALUES ($params)";

        if (
            $TIMESTAMP
            && isset($TIMESTAMP['status'])
            && $TIMESTAMP['status'] == true
            && isset($TIMESTAMP['CREATED_AT'])
            && $TIMESTAMP['CREATED_AT'] != null
        ) {

            $CREATED_AT = $TIMESTAMP['CREATED_AT'];
            $sql = "INSERT INTO $table ($columns, $CREATED_AT) VALUES ($params, CURRENT_TIMESTAMP())";
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute($data);

        return $conn->lastInsertId();
    }

    public function update(string $table, array $datainput, array $condition, array $TIMESTAMP = null)
    {
        $conn = $this->connections();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $columns = array();
        $data = array();
        $placeholders = array();

        foreach ($datainput as $key => $value) {
            $columns[] = "$key = :$key";
            $data[":$key"] = $value;
        }

        $setClause = implode(', ', $columns);

        $whereClause = "";
        if (!empty($condition)) {
            $whereColumns = array();
            foreach ($condition as $key => $value) {
                $whereColumns[] = "$key = :cond_$key";
                $data[":cond_$key"] = $value;
            }
            $whereClause = "WHERE " . implode(' AND ', $whereColumns);
        }

        $sql = "UPDATE $table SET $setClause $whereClause LIMIT 1";

        if (
            $TIMESTAMP
            && isset($TIMESTAMP['status'])
            && $TIMESTAMP['status'] == true
            && isset($TIMESTAMP['UPDATED_AT'])
            && $TIMESTAMP['UPDATED_AT'] != null
        ) {
            $UPDATED_AT = $TIMESTAMP['UPDATED_AT'];
            $sql = "UPDATE $table SET $setClause, $UPDATED_AT = CURRENT_TIMESTAMP() $whereClause LIMIT 1";
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute($data);

        return true;
    }


    // Lấy dữ liệu của 1 bảng ghi
    public function first(string $table, array $conditions = [])
    {
        $conn = $this->connections();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $whereClause = "";
        $data = [];

        if (!empty($conditions)) {
            $where = [];
            foreach ($conditions as $key => $value) {
                $where[] = "$key = :$key";
                $data[":$key"] = $value;
            }
            $whereClause = "WHERE " . implode(" AND ", $where);
        }

        $sql = "SELECT * FROM $table $whereClause LIMIT 1";

        $stmt = $conn->prepare($sql);
        $stmt->execute($data);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // Lấy dữ liệu tất cả bảng ghi của bảng
    public function all(string $table)
    {
        $conn = $this->connections();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM $table";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy dữ liệu nhiều bảng ghi dựa trên điều kiện
    public function get(string $table, array $conditions = [], int $limit = null, int $offset = null)
    {
        $conn = $this->connections();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $whereClause = "";
        $data = [];

        if (!empty($conditions)) {
            $where = [];
            foreach ($conditions as $key => $value) {
                $where[] = "$value[0] $value[1] :$value[2]";
                $data[":$value[0]"] = $value[2];
            }
            $whereClause = "WHERE " . implode(" AND ", $where);
        }

        $limitClause = "";
        if ($limit !== null) {
            $limitClause = "LIMIT $limit";
        }

        $offsetClause = "";
        if ($offset !== null) {
            $offsetClause = "OFFSET $offset";
        }

        $sql = "SELECT * FROM $table $whereClause $limitClause $offsetClause";
        // var_dump($sql);

        $stmt = $conn->prepare($sql);
        $stmt->execute($data);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(string $table, array $conditions)
    {
        $conn = $this->connections();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $whereClause = "";
        $data = [];

        if (!empty($conditions)) {
            $where = [];
            foreach ($conditions as $key => $value) {
                $where[] = "$key = :$key";
                $data[":$key"] = $value;
            }
            $whereClause = "WHERE " . implode(" AND ", $where);
        }

        $sql = "DELETE FROM $table $whereClause LIMIT 1";

        $stmt = $conn->prepare($sql);
        $stmt->execute($data);

        return true;
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
        $conn = $this->connections();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare($sql);
        $stmt->execute($params);

        // Kiểm tra nếu là một truy vấn SELECT
        if (strpos(strtoupper($sql), 'SELECT') === 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Trả về true cho các truy vấn khác (INSERT, UPDATE, DELETE)
        return true;
    }
}

?>