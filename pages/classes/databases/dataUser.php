<?php

include("database.php");

class dataUser extends database
{
    private $usrArr=array();

   public function __construct()
   {    parent::__construct();



   }
   function getAllUsers(){
       $sql="SELECT * FROM users";
       $result=$this->conn->query($sql);
        //$user =new User();
       if($result->num_rows>0){
           while($row=$result->fetch_assoc()){
               //读取数据存入对象
               //var_dump($row);
               var_dump($this->usrArr);
               var_dump($row);
//               $user=new User();
//               $user->setUser($row["UserName"]);
//               $user->setPassWord($row["PassWord"]);
              //  var_dump($user);


           }

       }


   }


}


//程序正常执行逻辑......

$datauser=new dataUser();
$datauser->getAllUsers();