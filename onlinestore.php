<?php
    session_start();
    if($_SESSION == null)
    {
        header("Location: auth.php");
    }
    if($_SESSION["admin"])
    {
        require('admin.php');
    }
?>

<div class="content">
    <form action="onlinestore.php" method="get">
        <input type="text" name="tasks" id="tasks" placeholder="task">
        <input type="submit" name="ins" id="ins" value="Добавить">
        <input type="submit" name="exit" value="Выход">
    </form>
</div>

<?php
if(isset($_REQUEST['exit']))
{
    $_SESSION = array();
    session_destroy();
    header('Location: auth.php');
}
?>