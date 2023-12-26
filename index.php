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
	<script>
		function toggleSampleDbInfo() {
			var sampleDbInfo = document.getElementById("sampleDbInfo");
			sampleDbInfo.style.display = sampleDbInfo.style.display === "none" ? "block" : "none";
		}
	</script>
	<main class="container max-w-4xl mx-auto sm:p-8 p-4">
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

			<button class="mb-4 btn" type="button" onclick="toggleSampleDbInfo()">Show/Hide Info</button>

			<div class=" mb-4 p-4 bg-gray-800 text-white rounded" id="sampleDbInfo">
				<div class="grid grid-cols-2">
					<span>
						<p class="text-xl mb-2">MySQL Credentials Sample</p>
						<ul>
							<li><strong>Host:</strong> 65817845.dorsy.net</li>
							<li><strong>Database Name:</strong> d03f0154</li>
							<li><strong>Username:</strong> d03f0154</li>
							<li><strong>Password:</strong> xaxqneYvB5u9YQYesPZC</li>
							<li><strong>Port:</strong> 3306</li>
						</ul>
					</span>
					<span>
						<p class="text-xl mb-2">Queries Sample</p>
						<p>SELECT * from Daily_Email_Log;</p>
						<p>SELECT HOUR(timestamp) AS hour, AVG(temperature) AS average_temperature
							FROM AC_Thermometer_Log
							GROUP BY HOUR(timestamp);</p>
					</span>
				</div>
			</div>
			<h2 class="text-xl text-[#38bdf8] font-bold">Query</h2>
			<div class="mt-2 mb-4 rounded-lg">
				<textarea required name="query" class="input h-[200px]"></textarea>
			</div>
			<button type="submit" class="btn">Search</button>
		</form>
		<div class="w-full mt-8 bg-[#000] p-4 rounded-lg">
			<canvas id="myChart"></canvas>
		</div>
	</main>

	<script>
		const ctx = document.getElementById("myChart").getContext('2d');
		const myChart = new Chart(ctx, {
			type: 'line',
			data: {
				...parseJsonForChart(<?php include 'query.php' ?>),
			},
			options: {
				responsive: true,
				scales: {
					x: {
						ticks: {
							color: '#fff'
						},
					},
					y: {
						ticks: {
							color: '#fff'
						},
					}
				},
				plugins: {

					legend: {
						position: 'top',
						labels: {
							color: "#ffffff",
						}
					},

				},

			}
		},
		);
	</script>
</body>

</html>