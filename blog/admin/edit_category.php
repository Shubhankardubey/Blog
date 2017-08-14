<?php include('includes/header.php');?>


<?php 

$id=$_GET['id'];

//create DB object//
$db = new Database();

//create query//
$query = "SELECT * FROM categories WHERE id = ".$id;

//run query//
$category = $db->select($query)->fetch_assoc();

//create query//
$query = "SELECT * FROM categories";

//run query//
$categories = $db->select($query);

?>


<?php 

if(isset($_POST['submit'])){
	$name = mysqli_real_escape_string($db->link, $_POST['name']);
	
	if($name == ''){
		$error='Please fill out all the required fields';
	}else{
		$query = "UPDATE categories SET name='$name' WHERE id = ".$id;
		
		$update_row = $db->update($query); 
	}
}

?>

<?php 

if(isset($_POST['delete'])){
	$query = "DELETE FROM categories WHERE id = ".$id;
	$delete_row = $db->del($query); 
}
?>

<form role="form" method="post" action="edit_category.php?id=<?php echo $id;?>">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter the Category Name"
	value="<?php echo $category['name']; ?>">
  </div>
  <div>
<input name="submit" type="submit" class="btn btn-default" value="Submit">
<a href="index.php" class="btn btn-default">Cancel</a>
  <input name="delete" type="submit" class="btn btn-danger" value="Delete">
	</div>
	<br/>
  </form>

<?php include('includes/footer.php');?>