<?php
include 'includes/db/db_config.php';
include 'includes/functions/functions.php';
include 'includes/header.php';
include 'includes/sidebar.php';
$today_expenses_sum = todayExpenses($conn, $_SESSION['userid']);
$weekly_expenses_sum = weeklyExpenses($conn, $_SESSION['userid']);
$monthly_expenses_sum = monthlyExpenses($conn, $_SESSION['userid']);
$yearly_expenses_sum = yearlyExpenses($conn, $_SESSION['userid']);
$allexpenses = getAllUserItems($conn, $_SESSION['userid']);
$graphdata = graphExpenses($conn, $_SESSION['userid']);

$months = "";
$cost = "";
if($graphdata){
    //print_r($graphdata);
    foreach($graphdata as $get){
       $dmonth = $get['iMonths'];
       $dcost = $get['cost'];

        $dateObj   = DateTime::createFromFormat('!m', $dmonth);
       $monthName = $dateObj->format('F');

       $months .= ", ". $monthName;
       $cost .= ", ". $dcost;

    }

     $gMonth =  substr($months, 1); 
     $gCost =  substr($cost, 1);

     $array = explode(',', $gMonth);
    //print_r($array);
    $convert = implode("','", $array);
    //echo '<hr/>';
     $trime =  trim("'$convert'");
    
     
}

?>
        <main role="main">
            <section class="panel important">
                <h2><?php echo $_SESSION['username']; ?> Welcome to Your Dashboard </h2>
            </section>
            <section class="panel" id="panel">
                <p><strong>Today's Expenses</strong></p>
                <br>
                <h2>
                <?php if ($today_expenses_sum == "") 
                { 
                    echo "₦0"; 
                } 
                else {
                    echo '₦' . $today_expenses_sum;
                }
                ?>
                </h2>
            </section>
            <section class="panel" id="panel">
                <p><strong>Expenses this week</strong></p>
                <br>
                <h2>
                <?php if($weekly_expenses_sum==""){
                    echo "₦0";
                } else {
                    echo '₦' . $weekly_expenses_sum;
                }
                ?>
                </h2>
            </section>
            <section class="panel" id="panel">
                <p><strong>Expenses this month</strong></p>
                <br>
                <h2>
                <?php if ($monthly_expenses_sum==""){
                    echo "₦0";
                } else {
                    echo '₦' . $monthly_expenses_sum;
                }
                ?>
                </h2>
            </section>
            <section class="panel" id="panel">
                <p><strong>Expenses this year</strong></p>
                <br>
                <h2>
                <?php if($yearly_expenses_sum==""){
                    echo "₦0";
                } else {
                    echo '₦' . $yearly_expenses_sum;
                }
                ?>
                </h2>
            </section>
            <section class="panel important">
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
                            labels:  [ <?php echo $trime; ?>],
                            datasets: [{
                                label: 'Amount in ₦',
                                backgroundColor: '#1aa093',
                                borderColor: '#1aa093',
                                data: [ <?php echo $gCost; ?> ]
                               
                            }]
                        },

                        // Configuration options go here
                        options: {}
                    });
                </script>

            </section>


        </main>

        <?php include 'includes/footer.php'?>
