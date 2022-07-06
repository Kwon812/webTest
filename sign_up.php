<?php
$stu_info=$_POST["info"];
$major=$stu_info[0];
$stu_name = $stu_info[2];
$stu_num=$stu_info[1];
$id=$stu_info[3];
//$ps=password_hash($stu_info[4],PASSWORD_BCRYPT);
$ps=$stu_info[4];
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
    $check="select * from user_info where user_id='$id' or user_num='$stu_num'";
    if(mysqli_num_rows(mysqli_query($conn,$check))>0){
        echo "<script> alert('이미 존재하는 아이디(사용자) 입니다'); location.href='sign_up.html'; </script>";

    }
    else{

        $sql="insert into user_info(user_major,user_num,user_name,user_id,user_ps) values ('$major','$stu_num','$stu_name','$id','$ps')";
        if(mysqli_query($conn,$sql)){
            echo "<script> alert('회원가입 성공!'); location.replace('index.html'); </script>";
        }
        else echo "fail to ";
    }
}
mysqli_close($conn);
//echo "das {$stu_info[0]} ";
//echo "<script>location.href='login.html'</script>"

