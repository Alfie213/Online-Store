<div>
<form action="admin.php" name="adminpanel" class="form1--------------" method="get" onsubmit="return FormData();"
<ul>
<?php
require('data.php');
$con = mysqli_connect($host, $user, $pas) or die ('Error con');
mysqli_select_db($con, $db) or die ('Error db');
$request = "SELECT * FROM `users`";
$res = mysqli_query($con, $request);
foreach($res as $result)
{
    print("
    <li class='tsk---'>
        <label class='coolText---'>".$result['id_user']."</label>
        <label class='coolText---'>".$result['name']."</label>
        <label class='coolText---'>".$result['email']."</label>
        <label class='coolText---'>".$result['admin']."</label>
        <button type='submit' name='changeAdmin' value='".$result['id_user']."'>Admin/Not admin</button>
        <input type='checkbox' name='checkbox' disabled='disabled' value='".$result['id_user']."'
        ");
    if($result['admin'])
    {
        print("checked>");
    }
    else
    {
        print(">");
    }
    print("
    </li>
    ");
}
?>
</ul>
</form>
</div>

<?php

if(isset($_REQUEST['changeAdmin']))
{
    require('data.php');
    $con = mysqli_connect($host, $user, $pas) or die ('Error con');
    mysqli_select_db($con, $db) or die ('Error db');
    $request = "SELECT `admin` FROM `users` WHERE `id_user`='".$_REQUEST['changeAdmin']."'";
    $res = mysqli_query($con, $request);
    foreach($res as $result)
    {
        $res = $result['admin'];
    }
    if($res)
    {
        $upd = "UPDATE `users` SET `admin`='0' WHERE `id_user`='".$_REQUEST['changeAdmin']."'";
    }
    else
    {
        $upd = "UPDATE `users` SET `admin`='1' WHERE `id_user`='".$_REQUEST['changeAdmin']."'";
    }
    mysqli_query($con, $upd);
    header('Location: index.php');
}

?>