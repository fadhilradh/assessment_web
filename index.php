<!DOCTYPE html>
<html>

<head>
	<title>Fadhil Radhian's Query Tool</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script type="text/javascript" src="./js/utils.js"></script>
	<link rel="stylesheet" href="./css/main.css">
</head>

<body>
	<main class="container mx-auto sm:p-8 p-4">
		<h1 class="text-center text-4xl mb-4">MySQL Query Tool</h1>
		<h2 class="text-xl text-[#38bdf8] font-bold">Data</h2>
		<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
			<div class="grid grid-cols-2 sm:gap-x-8 gap-x-4 gap-y-4 mt-4 mb-8 rounded-lg">
				<div>
					<label for="host" class="label">Host</label>
					<input type="text" required name="host" id="host" class="input" placeholder="Host" />
				</div>
				<div>
					<label for="dbName" class="label">Database Name</label>
					<input type="text" required name="dbName" id="dbName" class="input" placeholder="DB" />
				</div>
				<div>
					<label for="username" class="label">Username</label>
					<input type="text" required name="username" id="username" class="input" placeholder="Username" />
				</div>
				<div>
					<label for="password" class="label">Password</label>
					<input type="password" required name="password" id="password" class="input"
						placeholder="Password" />
				</div>
				<div>
					<label for="port" class="label">Port</label>
					<input type="text" name="port" id="port" class="input" placeholder="Port" />
				</div>
			</div>
			<h2 class="text-xl text-[#38bdf8] font-bold">Query</h2>
			<div class="mt-2 mb-4 rounded-lg">
				<textarea required name="query" class="input h-[400px]"></textarea>
			</div>
			<button type="submit" class="btn">Search</button>
		</form>
		<div class="w-full mt-8">
			<canvas id="myChart"></canvas>
		</div>
	</main>

	<script>

		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				...parseJsonForChart(<?php include 'query.php' ?>),
			},
			options: {
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