<?php include 'includes/header.php'?>
<?php include 'includes/sidebar.php'?>
        <main role="main">
            <section class="panel important">
                <h2><?php echo $_SESSION['username']; ?> Welcome to Your Dashboard </h2>
            </section>
            <section class="panel" id="panel">
                <p><strong>Expenses this week</strong></p>
                <br>
                <h2>₦34,000</h2>
            </section>
            <section class="panel" id="panel">
                <p><strong>Purchases this week</strong></p>
                <br>
                <h2>₦34,000</h2>
            </section>
            <section class="panel" id="panel">
                <p><strong>Expenses this month</strong></p>
                <br>
                <h2>₦34,000</h2>
            </section>
            <section class="panel" id="panel">
                <p><strong>Expenses this year</strong></p>
                <br>
                <h2>₦34,000</h2>
            </section>
            <section class="panel important1">
                <p><strong><i class="fas fa-signal"></i> Expenses this year</strong></p>
                <hr>
                <canvas id="myChart" width="400" height="300"></canvas>
                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myBarChart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'bar',

                        // The data for our dataset
                        data: {
                            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                            datasets: [{
                                label: 'Amount in ₦',
                                backgroundColor: '#1aa093',
                                borderColor: '#1aa093',
                                data: [50000, 45000, 40000, 35000, 30000, 25000, 20000, 15000, 10000, 5000]
                            }]
                        },

                        // Configuration options go here
                        options: {}
                    });
                </script>

            </section>
            <section class="panel important1">
                <p><strong><i class="fas fa-chart-pie"></i> Yearly Expenses</strong></p>
                <hr>
                <canvas id="myChart1" width="400" height="300"></canvas>
                <script>
                    var ctx = document.getElementById('myChart1').getContext('2d');
                    var myDoughnutChart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'doughnut',

                        // The data for our dataset
                        data: {
                            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                            datasets: [{
                                label: 'Amount in ₦',
                                backgroundColor: '#1aa093',
                                borderColor: '#1aa093',
                                data: [50000, 45000, 40000, 35000, 30000, 25000, 20000, 15000, 10000, 5000],
                            }]
                        },

                        // Configuration options go here
                        options: {}
                    });
                </script>
            </section>


        </main>

        <?php include 'includes/footer.php'?>
