<?php




class database
{
    private $database = null;
    public $conn=null;
    private $username="root";
    private $passwd="zjy00322";
    private $host="127.0.0.1";
    private $dbname="h5";
    function __construct()
    {

        $this->conn = new mysqli($this->host,$this->username,$this->passwd,$this->dbname);
//connection check

//        if($this->conn->connect_error)
//         {
//        die("数据库连接失败！".$this->conn->connect_error);
//         }
//            echo "数据库连接成功";
//        $result = mysqli_select_db($this->conn, $this->dbname);
//        $this->database = $result;
//
//        if($result){
//        echo "数据库选择成功.";
//        }
//        else
//        {
//        echo "数据库选择失败.";
//        }
        //首次运行创建数据表users
//
//            $sql1="CREATE  TABLE  `users`(`Id` int PRIMARY KEY AUTO_INCREMENT
//,`UserName` varchar(255),
//`PassWord` varchar(255))";
//
//            if ($this->conn->query($sql1) === TRUE) {
//                echo "Table users created successfully";
//            }
//            elseif ($this->conn->error==="Table 'users' already exists"){
//
//            }
//            else {
//                echo "创建数据表错误: " . $this->conn->error;
//            }
    }

    function __destruct()
    {
        // disconnect.
       $result=$this->conn->close();
        $this->database = $result;
    }






//$db=new database();
}
//$db=new database();

