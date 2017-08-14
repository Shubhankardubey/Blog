<?php include('includes/header.php');?>

<?php 

//create DB object//
$db = new Database();


if(isset($_POST['submit'])){
	$name = mysqli_real_escape_string($db->link, $_POST['name']);
	if($name == ''){
		$error='Please fill out all the required fields';
	}else{
		$query = "INSERT INTO categories(name) VALUES
		('$name')";
		
		$update_row = $db->update($query); 
	}
}

?>

<form role="form" method="post" action="add_category.php">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter the Category Name">
  </div>
  <div>
<input name="submit" type="submit" class="btn btn-default" value="Submit">
<a href="index.php" class="btn btn-default">Cancel</a>
	</div>
	<br/>
  </form>

<?php include('includes/footer.php');?>