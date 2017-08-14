<?php include('includes/header.php');?>

<?php 
//create DB object//
$db = new Database();

//create query//
$query = "SELECT posts.*, categories.name FROM posts INNER JOIN categories ON posts.category = categories.id
ORDER BY posts.title DESC";

//run query//
$posts = $db->select($query);

//create query//
$query = "SELECT * FROM categories ORDER BY name DESC";

//run query//
$categories = $db->select($query);
?>
		
			<!-- CONTENT HERE -->
		

		
<table class="table table-striped">
<tr>
<th>Post ID#</th>
<th>Post Title</th>
<th>Category</th>
<th>Author</th>
<th>Date</th>
</tr>

<?php while($row = $posts->fetch_assoc()) : ?>
<tr>
<td><?php echo $row['id'] ;?></td>
<td><a href="edit_post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title'] ;?></td>
<td><?php echo $row['name'] ;?></td>
<td><?php echo $row['author'] ;?></td>
<td><?php echo formateDate($row['date']) ;?></td>
</tr>
<?php endwhile;?>


</table>
<br/>
<table class="table table-striped">
<tr>
<th>Category ID#</th>
<th>Category Name</th>
</tr>
<?php while($row = $categories->fetch_assoc()) : ?>
<tr>
<td><?php echo $row['id'] ;?></td>
<td><a href="edit_category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name'] ;?></td>
</tr>
<?php endwhile;?>


</table>
			
<?php include('includes/footer.php');?>
			
			