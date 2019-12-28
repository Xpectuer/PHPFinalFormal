<?php
//
//include ("databases/database.php");
class User
{//备用数据类


    private $Id;
    private $username;
   // private $password;
    private $authority;
    private $email;
    private $phoneNr;
    private $profile_image;



    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $this->$name=$value;
    }
    public function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->$name;
    }



    //function __construct($id)
//{
//    $this->Id=$id;
//    $this->db=new database();
//    $sql="SELECT * FROM `users` where Id='$this->Id'";
//    //取数据
//    $result=$this->db->query($sql);
//    $row=$result->fetch_row();
//    var_dump($row);
//   $this->username=$row["UserName"];
//   $this->password=$row["PassWord"];
//}
//
}
//$user=new User(1);