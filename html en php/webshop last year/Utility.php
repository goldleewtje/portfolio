<?php
class database
{
    private $conn;
    function connectDatabase()
    {
        $host        =    'localhost';
        $user        =    'root';
        $password    =    '';
        $database    =    'phpopdracht';
        $this->conn  =    mysqli_connect($host,$user,$password, $database) or die('Server Information is not Correct');

        if (!$this->conn)
        {
            echo "<div>";
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            echo "</div>";
        }
        return $this->conn;
    }

    function getDataRow($sql)
    {
        //$this->conn;

        $query = mysqli_query( $this->conn, $sql);
        $row = mysqli_fetch_array($query);

        return $row;
    }

    function customQuery($sql)
    {
        mysqli_query( $this->conn, $sql);
    }

}
?>
