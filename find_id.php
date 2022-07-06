

<?php

$name=$_POST["name"];
$num=$_POST["num"];


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
    $sql="select * from user_info where user_name='$name' and user_num='$num'";
    $result=mysqli_query($conn,$sql);
    $user_info=mysqli_fetch_array($result);
    if(mysqli_num_rows($result)>0){
        echo "<script> alert('id : {$user_info[4]} '); </script>";
//        echo "학과 : {$user_info[1]}  이름 : {$user_info[3]}";
        echo "<script>location.href='index.html'</script>";
    }
    else
        echo "<script> alert('일치하는 사용자 정보가 없습니다'); location.href='index.html';</script>";
}
mysqli_close($conn);


