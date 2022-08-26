<?php

class DB
{
    private static $conn;
    
    // Kết nối cơ sở dữ liệu
    public static function connection()
    {
        $db = func_get_args();

        self::$conn = new mysqli($db[0], $db[1], $db[2], $db[3]);
    }
    

    // Thực hiện truy vấn SQL
    public static function query($query_string) 
    {
        $result = mysqli_query(self::$conn, $query_string);
        if (!$result) {
            self::sql_error('Query Error', $query_string);
        }
        return $result;
    }

    // Lấy 1 dòng dữ liệu
    public static function fetch_row($query_string) {
        $result = [];
        $mysqli_result = self::query($query_string);
        $result = mysqli_fetch_assoc($mysqli_result);
        mysqli_free_result($mysqli_result);
        return $result;
    }

    // Lấy 1 mảng dữ liệu
    public static function fetch_array($query_string) {
        $result = [];
        $mysqli_result = self::query($query_string);
        while ($row = mysqli_fetch_assoc($mysqli_result)) {
            $result[] = $row;
        }
        mysqli_free_result($mysqli_result);
        return $result;
    }

    //Lấy số bản ghi
    public static function db_num_rows($query_string) {
        $mysqli_result = self::query($query_string);
        return mysqli_num_rows($mysqli_result);
    }

    // Chèn dữ liệu vào DB
    public static function insert($table, $data) 
    {
        $fields = "(" . implode(", ", array_keys($data)) . ")";
        $values = "";
        foreach ($data as $field => $value) {
            if ($value === NULL)
                $values .= "NULL, ";
            else
                $values .= "'" . self::escape_string($value) . "', ";
        }
        $values = substr($values, 0, -2);
        self::query("
                INSERT INTO $table $fields
                VALUES($values)
            ");
        return mysqli_insert_id(self::$conn);
    }

    // Cập nhật dữ liệu trong DB
    public static function update($table, $data, $where) {
        $sql = "";
        foreach ($data as $field => $value) {
            if ($value === NULL)
                $sql .= "$field=NULL, ";
            else
                $sql .= "$field='" . self::escape_string($value) . "', ";
        }
        $sql = substr($sql, 0, -2);
        self::query("
                UPDATE $table
                SET $sql
                WHERE $where
       ");
        return mysqli_affected_rows(self::$conn);
    }

    // Xoá dữ liệu trong DB
    public static function delete($table, $where) {
        $query_string = "DELETE FROM " . $table . " WHERE $where";
        self::query($query_string);
        return mysqli_affected_rows(self::$conn);
    }

    public function escape_string($str) 
    {
        return mysqli_real_escape_string(self::$conn, $str);
    }

    // Log lỗi truy vấn
    public function sql_error($message, $query_string = "") 
    {
        $sqlerror = "<table width='100%' border='1' cellpadding='0' cellspacing='0'>";
        $sqlerror.="<tr><th colspan='2'>{$message}</th></tr>";
        $sqlerror.=($query_string != "") ? "<tr><td nowrap> Query SQL</td><td nowrap>: " . $query_string . "</td></tr>\n" : "";
        $sqlerror.="<tr><td nowrap> Error Number</td><td nowrap>: " . mysqli_errno(self::$conn) . " " . mysqli_error(self::$conn) . "</td></tr>\n";
        $sqlerror.="<tr><td nowrap> Date</td><td nowrap>: " . date("D, F j, Y H:i:s") . "</td></tr>\n";
        $sqlerror.="<tr><td nowrap> IP</td><td>: " . getenv("REMOTE_ADDR") . "</td></tr>\n";
        $sqlerror.="<tr><td nowrap> Browser</td><td nowrap>: " . getenv("HTTP_USER_AGENT") . "</td></tr>\n";
        $sqlerror.="<tr><td nowrap> Script</td><td nowrap>: " . getenv("REQUEST_URI") . "</td></tr>\n";
        $sqlerror.="<tr><td nowrap> Referer</td><td nowrap>: " . getenv("HTTP_REFERER") . "</td></tr>\n";
        $sqlerror.="<tr><td nowrap> PHP Version </td><td>: " . PHP_VERSION . "</td></tr>\n";
        $sqlerror.="<tr><td nowrap> OS</td><td>: " . PHP_OS . "</td></tr>\n";
        $sqlerror.="<tr><td nowrap> Server</td><td>: " . getenv("SERVER_SOFTWARE") . "</td></tr>\n";
        $sqlerror.="<tr><td nowrap> Server Name</td><td>: " . getenv("SERVER_NAME") . "</td></tr>\n";
        $sqlerror.="</table>";
        $msgbox_messages = "<meta http-equiv=\"refresh\" content=\"9999\">\n<table class='smallgrey' cellspacing=1 cellpadding=0>" . $sqlerror . "</table>";
        echo $msgbox_messages;
        exit;
    }
}
