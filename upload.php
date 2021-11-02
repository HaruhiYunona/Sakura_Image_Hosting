<?php
include_once('./config/config.php');
//返回json
function rejson($result, $info)
{
    $arr = array('result' => $result, 'info' => $info, 'time' => time());
    echo json_encode($arr);
}

$image_data = $_POST['image'];
$filename = $_POST['filename'];
if ($image_data !== null && $image_data !== "") {
    //截取正确的base64文件流
    $image_data = substr($image_data, strrpos($image_data, "base64,") + 7);
    $steam_len = strlen($image_data);
    $file_size = ceil($steam_len * 0.75);
    $tmp_path = config('tmp_floder')."/" . time() . $filename;
    $bit = file_put_contents($tmp_path, base64_decode($image_data));
    if ($bit > 0) {
        if ($file_size <= config('sizeLimt') && $file_size > 0) {
             if(exif_imagetype($tmp_path)){
                             //获取缓存文件md5并删除缓存文件
            $file_md5 = md5_file($tmp_path);
            unlink($tmp_path);
            //链接数据库
            $servername = config('servername');
            $username = config('username');
            $password = config('password');
            $dbname = config('dbname');
            $port = config('port');
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname;port=$port;", $username, $password);
            } catch (PDOException $e) {
                rejson('error', $e->getMessage());
            }
            $sql = "SELECT * FROM `pics` WHERE `md5` = '{$file_md5}'";   
            $result = $conn->query($sql);
            $pic_check = $result->fetch();
            if ($pic_check['uid'] !== null) {
                rejson('success', $pic_check['picname']);
            } else {
                $filename = date('YmdHis') . mt_rand(100000, 999999) . ".png";
                $bit = file_put_contents(config('floder')."/".$filename, base64_decode($image_data)); 
                if($bit>0){
                    $sql = "INSERT INTO `{$dbname}`.`pics` (`uid`, `md5`, `time`, `picname`) VALUES (NULL, '{$file_md5}', '{$time}', '{$filename}')";
                    if ($conn->exec($sql) > "0") {
                        rejson('success',$filename);
                    } else {
                        rejson('error', '数据库出现问题，请联系管理员检查');
                    }                      
                }else{
                    rejson('error', '图片丢失！无法写入指定文件夹，请联系管理员查看服务器文件夹是否给予足够权限');
                }               
            } 
             }else{
            unlink($tmp_path);  
            rejson('error', '狗贼！你居然传假图片！');
             }                      
        }else{
            rejson('error', '图片大小超过限制！');
        }
    }else{
        rejson('error', '图片无法解析！');
    }
} else {
    rejson('error', '请点击上方选择一张图片上传！');
}
?>