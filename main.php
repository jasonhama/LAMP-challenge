<?php
$servername = "127.0.0.1";
$username = "moviesusers";
$password = "bacon";
$dbname = "movies";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movies</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body class="container">
    <h1>Movie Revenues From 2014</h1>
    <form method="GET" action="" class="form">
        <input type="search" 
                name="title" 
                class="form-control" 
                value=""
                placeholder="search by title">
    </form>

        <table class="table">
			<thead>
				<tr>
					<th>Title</th>
					<th class="text-right">Release Date</th>
					<th class="text-right">Tickets Sold</th>
					<th class="text-right">Gross Revenue</th>
				</tr>
			</thead>
			<tbody>
			
			<?php
			$sql = "SELECT * FROM main";
			
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				
				// output data of each row
				while($row = $result->fetch_assoc()) {
				?>
			<tr>
				<td>
					<a href=movies.php?id=<?=$row["id"]?>>
						<?=$row["title"]?>
					</a>
				</td>
				
				<td class="text-right">
				
				<?php
				$date = $row['released'];
				$exploded_date = explode("-", $date);
				$fixed_date = date('j-M-Y',mktime(0, 0, 0, $exploded_date[1], $exploded_date[2], $exploded_date[0]));
				?>
				
					<?=$fixed_date?>
				</td>
				<td class="text-right">
				<?php
				$tickets = $row['tickets'];
				$formatted_tickets = number_format($tickets, 0, ',', ',');
				//alter tickets here
				//xx,xxx
				?>
					<?=$formatted_tickets?>
				</td>
				<td class="text-right">
				<?php
				$gross = $row['gross'];
				$formatted_gross = '$' . number_format($gross, 0, ',', ',');
				//alter gross to format
				//$x,xxx,xxx
				?>				
					<?=$formatted_gross?>
				</td>
			</tr>	
			<?php
				}
			} else {
				echo "<br/> Sorry I can't find this pokemon";
			}
			?>
			<!--format for the loop
			<tr>
				<td>
					<a href=movies.php?id=xxx>
						title
					</a>
				</td>
				<td class="text-right">
					date
				</td>
				<td class="text-right">
					tickets
				</td>
				<td class="text-right">
					gross
				</td>
			</tr>
			-->
			</tbody>
		</table>
    </body>
</html>