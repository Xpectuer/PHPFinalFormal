
<?php
//
////function copy_stream($src, $dest)
////{
////$fsrc = fopen($src, 'r');
////$fdest = fopen($dest, 'w+');
////$len = stream_copy_to_stream($fsrc, $fdest);    //  流的复制
////fclose($fsrc);
////fclose($fdest);
////
////return $len;
////}
////
////$image = mysqli_real_escape_string(file_get_contents($_FILES['photo']['tmp_name']));
////$sqlstr = "insert into passages(`image`) values('".$image."') ";
////@mysqli_query($sqlstr) or die(mysqli_error());
////exit();
////
////
//
//    $nameTag = time();
//    $filename1 = $nameTag.'0'.substr($_FILES['photo1']['name'], strrpos($_FILES['photo1']['name'],'.'));
//    $response = array();
//    $path1 = "../../lib/uploads/2019/12/".$filename1;//注意要在目录下新建一个名为img的文件夹用来存放图片
//   if(move_uploaded_file($_FILES['photo1']['tmp_name'], $path1) ){
//      $response['isSuccess'] = true;
//      $response['photo1'] = $path1;
//     }else{
//     $response['isSuccess'] = false;
//   }
//    echo json_encode($response);
//


//解决跨域问题
header("Access-Control-Allow-Origin:*");
//说明向前台返回的数据类型为JSON
header("Content-type:image/jpeg");
//$_FILES超全局变量存储是文件数据，是一个关联数组
//var_dump($_SERVER["DOCUMENT_ROOT"]);
$fileObj = $_FILES['file'];
//var_dump($fileObj);
if ($fileObj["error"] == 0) {
    //判断文件是否合法
    $types = ["jpg", "jpeg"];

    $type = explode("/", $fileObj["type"])[1];
  //  var_dump($fileObj);
//    echo $fileObj["type"];
    if (in_array($type, $types)) {
       $time = time();//获取时间戳 返回一个整形
//        //获取文件详细路径
        $filePath ="/Volumes/files/Doc/Web/Documents/PHPFinal/lib/uploads/2019/12/".$time.".jpg";
        //echo $filePath;
        //移动文件
        $res = move_uploaded_file($fileObj["tmp_name"], $filePath);
       // var_dump($res);
        if ($res) {
            $infor =  array("err"=>0,"msg"=>"file move success");
            $name=$time.".jpg";
            echo $name;
        } else {
            echo "img0.jpg";
        }
    } else {
        echo "img1.jpg";
    }

}

