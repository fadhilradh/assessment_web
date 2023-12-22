<!DOCTYPE html>
<html>
<head>
    <title>Database Query Tool</title>
    <script src="https://cdn.tailwindcss.com"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script type="text/javascript" src="./js/utils.js"></script>
	<link rel="stylesheet" href="./css/main.css">
</head>
<body>
	<main class="container mx-auto p-4">
      <h2 class="text-2xl font-bold">MySQL Data</h2>
      <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
		<div class="grid grid-cols-2 gap-4 mt-2 mb-8 rounded-lg">
		  <input type="text" required name="host" class="input" placeholder="MySQL Host" />
		  <input type="text" required name="dbName" class="input" placeholder="MySQL Database" />
		  <input type="text" required name="username" class="input" placeholder="MySQL Username" />
		  <input type="text" required name="password" class="input" placeholder="MySQL Password" />
		  <input type="text" name="port" class="input" placeholder="MySQL Port" />
		</div>
		<h2 class="text-2xl font-bold">MySQL Query</h2>
		<div class="mt-2 mb-4 rounded-lg">
		  <textarea required name="query" class="input h-[400px]"></textarea>
		</div>
		<button type="submit" class="btn">Search</button>
	  </form>
      <div style="width: 800px; margin: 0px auto;">
		<canvas id="myChart"></canvas>
	  </div>
    </main>
					
	<script>	
		
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				...parseJsonForChart(<?php
						$host = $_POST['host'];
						$dbName = $_POST['dbName'];
						$username = $_POST['username'];
						$password = $_POST['password'];
						$query = $_POST['query'];
						$port = $_POST['port'];
					
						$db_conn = mysqli_connect($host,$username,$password,$dbName,$port);
						if (mysqli_connect_errno()){
							echo "DB Connection Error : " . mysqli_connect_error();
						} 
						$data = mysqli_query($db_conn, $query);
						$rows = array();
						while($r = mysqli_fetch_assoc($data)) {
							$rows[] = $r;
						}
						echo json_encode($rows);
					?>), 
			},
				options : {
					plugins: {
						colors: {
							enabled: true
						}
					}
				}
			},
		);
	</script>
</body>
</html>