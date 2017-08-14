<?php include('includes/header.php');?>

<?php 

//create DB object//
$db = new Database();

//chech URL for category//
if(isset($_GET['category'])){
	$category = $_GET['category'];
	//create query//
	$query = "SELECT * FROM posts WHERE category =".$category;

	//run query//
	$posts = $db->select($query);
}
else{
	//create query//
	$query = "SELECT * FROM posts";

	//run query//
	$posts = $db->select($query);

}

//create query//
$query = "SELECT * FROM categories";

//run query//
$categories = $db->select($query);

?>
<?php if($posts) : ?>

<?php while($row = $posts->fetch_assoc()) : ?>

<div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title'];?></h2>
            <p class="blog-post-meta"><?php echo formateDate($row['date']);?> by <a href="#"><?php echo $row['author'];?></a></p>
            <p><?php echo shortenText($row['body']);?></p>
			<a class="readmore" href="post.php?id=<?php echo urlencode($row['id']) ;?>">Read More</a>
			</div><!-- /.blog-post -->
<?php endwhile;?>

 <?php else :?>
<p>There are no posts yet!!!</p>
<?php endif;?>
<?php include('includes/footer.php');?>