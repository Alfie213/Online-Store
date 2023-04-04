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

<ul class="products clearfix">
	<li class="product-wrapper">
		<a href="" class="product">
			<div class="product-photo">
	        <img src="./media/100.jpg" alt="">
        	</div>
			<p>href</p>
		</a>
	</li>
	<li class="product-wrapper">
		<a href="" class="product">
			<div class="product-photo">
	        <img src="./media/cats.jpg" alt="">
        	</div>
			<p>url</p>
		</a>
	</li>
	<li class="product-wrapper">
		<a href="" class="product"></a>
	</li>
	<li class="product-wrapper">
		<a href="" class="product"></a>
	</li>
	<li class="product-wrapper">
		<a href="" class="product"></a>
	</li>
	<li class="product-wrapper">
		<a href="" class="product"></a>
	</li>
	<li class="product-wrapper">
		<a href="" class="product"></a>
	</li>
	<li class="product-wrapper">
		<a href="" class="product"></a>
	</li>
</ul>

<?php
if(isset($_REQUEST['exit']))
{
    $_SESSION = array();
    session_destroy();
    header('Location: auth.php');
}
?>