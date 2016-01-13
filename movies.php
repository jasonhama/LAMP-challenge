
<?php
$servername = "localhost";
$username = "banana";
$password = "banana";
$dbname = "lamp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_GET["id"];
$sql = "SELECT * FROM main where id = " . $id;
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body class="container">
    <div class="row">
        <div class="col-md-4">
            <img class="img-responsive" src="poster.php?imdb_id=tt1924435" alt="">
        </div>
        <div class="col-md-8">
		
			<?php
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					?>
			<h1><?=$row['title']?></h1>
            <p>Comedy movie rated <?php?></p>
            <p>Released on <?php?></p>
            <p>This movie sold <?php?> tickets, earning gross revenues of $<?php?></p>
            <p>

            <h2>Rotten Tomatoes Rating</h2>
            <p>
                Rated 18% by 73 people
            </p>
            <p>
                Damon Wayans, Jr. and Jake Johnson have comedic chemistry; unfortunately, Let's Be Cops fails to do anything with it.            </p>
					<?php
				}
			}
			?>
        </div>
    </div>


</body>
</html>