<?php include('includes/header.php');?>

<?php 

//create DB object//
$db = new Database();


if(isset($_POST['submit'])){
	$title = mysqli_real_escape_string($db->link, $_POST['title']);
	$body = mysqli_real_escape_string($db->link, $_POST['body']);
	$category = mysqli_real_escape_string($db->link, $_POST['category']);
	$author = mysqli_real_escape_string($db->link, $_POST['author']);
	$tags = mysqli_real_escape_string($db->link, $_POST['tags']);
	
	if($title == '' || $body == '' || $category == '' || $author == '' || $tags == ''){
		$error='Please fill out all the required fields';
	}else{
		$query = "INSERT INTO posts(title, body, category, author, tags) VALUES
		('$title', '$body', '$category', '$author', '$tags')";
		
		$insert_row = $db->insert($query); 
	}
}

?>

<?php 


//create query//
$query = "SELECT * FROM categories";

//run query//
$categories = $db->select($query);

?>

<form role="form" method="post" action="add_post.php">
  <div class="form-group">
    <label>Post Title</label>
    <input type="text" name="title" class="form-control" placeholder="!!! Give a suitable Title !!!">
  </div>
  <div class="form-group">
  <label>Post Body</label>
    <textarea name="body" class="form-control" placeholder="!! Write your blog !!"></textarea>
  </div>
  <div class="form-group">
  <label>Category</label>
 <select name="category" class="form-control">
 <?php while($row = $categories->fetch_assoc()) :?>
 <?php if($row['id'] == $post['category']){
	$selected = 'selected'; 
 }else{
	 $selected = '';
 } ?>
   <option  <?php echo $selected;?> value="<?php echo $row['id'];?>"> <?php echo $row['name'];?> </option>
  <?php endwhile; ?>
</select>
  </div>
  <div class="form-group">
  <label>Author</label>
    <input type="text" name="author" class="form-control" placeholder="* Your Name or Author Name*">
  </div>
  <div class="form-group">
  <label>Tags</label>
    <input type="text" name="tags" class="form-control" placeholder="To where it belongs..">
	
  </div>
  <div>
<input name="submit" type="submit" class="btn btn-default" value="Submit">
  <a href="index.php" class="btn btn-default">Cancel</a>
</div>
<br/>
  </form>

<?php include('includes/footer.php');?>