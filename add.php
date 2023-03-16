<?php 

include_once('db.php');

if (isset($_POST['add'])) {
	// code...
	 $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $name = $_POST['name'];
    $code = $_POST['code'];
    $category = $_POST['category'];
    $price= $_POST['price'];
   

    if (!in_array($extension, ['jpg','jpeg','png'])) {
        echo "You file extension must be .jpg, .jpeg or .png";
    } elseif ($_FILES['myfile']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
           echo $sql = "INSERT INTO menu (`code`,`name`,`category`,`price`,image) VALUES ('$code','$name',$category,'$price','$filename')";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}

$cate= "SELECT * FROM `category`";
$sql = mysqli_query($conn,$cate);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add</title>
</head>
<body>
	<h1>Add New Product</h1>
<form action="add.php" method='post' enctype="multipart/form-data">
	<div>
		<label>Image</label><br>
		<input type="file" name="myfile">
	</div>
    	<div>
		<label> Name</label><br>
		<input type="text" name="name">
	</div>
    <div>
		<label> Food Code</label><br>
		<input type="text" name="code">
	</div>
    <div>
    <label> Category</label><br>
    <select name="category">
		<?php while($row = mysqli_fetch_array($sql)) {?>
		<option value="<?=$row['id']?>"><?=$row['category']?></option>
	<?php } ?>
	</select>
    </div>
	<div>
		<label>Price</label><br>
		<input type="text" name="price">
	</div>
	<div><br>
		<input type="submit" name="add" value="Sumbit">
	</div>
	
</form>
</body>
</html>