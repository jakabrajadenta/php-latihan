<?php

class Model{
    
    private $server = "localhost";
    private $username = "root";
    private $password;
    private $db = "db_phpempmgnt";
    private $conn;

    public function __construct(){
        try {
            $this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
        } catch (Exception $e) {
            echo "connection failed" . $e->getMessage();
        }
    }

    public function create(){
        if (isset($_POST['submit'])) {
            if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['address'])) {
                if (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['address']) ) {
                    
                    $name = $_POST['name'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];

                    $query = "INSERT INTO employee (name,phone,address) VALUES ('$name','$phone','$address')";
                    if ($sql = $this->conn->query($query)) {
                        echo "<script>alert('employee added successfully');</script>";
                        echo "<script>window.location.href = 'index.php';</script>";
                    }else{
                        echo "<script>alert('failed');</script>";
                        echo "<script>window.location.href = 'index.php';</script>";
                    }

                }else{
                    echo "<script>alert('empty');</script>";
                    echo "<script>window.location.href = 'index.php';</script>";
                }
            }
        }
    }

    public function readAll(){
        $data = null;

        $query = "SELECT * FROM employee";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function readOne($id){
        $data = null;

        $query = "SELECT * FROM employee WHERE id = '$id'";
        if ($sql = $this->conn->query($query)) {
            while($row = $sql->fetch_assoc()){
                $data = $row;
            }
        }
        return $data;
    }

    public function update($data){
        $query = "UPDATE employee SET name='$data[name]', phone='$data[phone]', address='$data[address]' WHERE id='$data[id] '";
        if ($sql = $this->conn->query($query)) {
            return true;
        }else{
            return false;
        }
    }

    public function delete($id){

            $query = "DELETE FROM employee WHERE id = '$id'";
			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
    }

}

?>