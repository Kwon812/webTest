<?php
$id=$_POST["ID"];
$ps=$_POST["PW"];


$host = 'localhost';
$user = 'tre723';
$pw = 'rnjsehgud1!';
$dbName = 'tre723';

$conn = mysqli_connect($host, $user, $pw, $dbName);
if (mysqli_connect_errno())
{
    echo "MySQL 접속 실패". mysqli_connect_error();
    exit;
}else{
    $sql="select * from user_info where user_id='$id'";
    $result=mysqli_query($conn,$sql);
    $user_info=mysqli_fetch_array($result);
    if(mysqli_num_rows($result)>0){
        if($ps==$user_info[5]) {

            echo "<script> alert('로그인 성공!'); </script>";
            echo "학과 : {$user_info[1]}  이름 : {$user_info[3]}";
        }
        else{
            echo "<script> alert('비밀번호를 확인해 주세요') ; location.href='index.html';</script>";
        }
    }
    else
        echo "<script> alert('아이디와 비밀번호를 확인해 주세요') ; location.href='index.html';</script>";
}
mysqli_close($conn);


