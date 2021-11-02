<?php
function config($name){
$config=array(
    "servername" => "localhost",       //数据库服务器地址
    "username" => "username",          //数据库用户名
    "password" => "password",          //数据库密码
    "dbname" => "dbname",              //数据库名
    "port" => "3306",                  //数据库端口
    "floder" => "./pic",               //上传图片存储文件夹
    "tmp_floder" =>"./tmp",            //缓存文件夹
    "sizeLimt" => "10485760"           //文件大小限制
);
return $config[$name];
}
