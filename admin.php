<div>
<ul>
<?php
require('data.php');
$con = mysqli_connect($host, $user, $pas) or die ('Error con');
mysqli_select_db($con, $db) or die ('Error db');
$request = "SELECT * FROM `users`";
print( $request);
$res = mysqli_query($con, $request);
foreach($res as $result)
{
    print("
    <li class='tsk---'>
        <label class='coolText---'>".$result['id_user']."</label>
        <label class='coolText---'>".$result['name']."</label>
        <label class='coolText---'>".$result['email']."</label>
        <label class='coolText---'>".$result['admin']."</label>
    </li>
    ");
}
?>
</ul>
</div>