<?php 
include('includes/db/db_config.php');
include('includes/functions/functions.php');
include('includes/header.php');
include('includes/sidebar.php');
$fdate= $_POST['fdate'];
$tdate= $_POST['tdate'];
$dateformat = '"%Y-%m-%d"';
$expense_reports = expenseReports($conn, $_SESSION['userid'], $fdate, $tdate);
?>

<main role="main">
<section class="panel important">
            <div class="col-sm-12 mb-6">
            <p></p>
            <h5><strong><?php echo 'Expense Report From ' .$fdate. ' to ' .$tdate; ?></strong></h5>
            <p></p>
            <p></p>
            <div class="col-sm-12 mb-12">
            <table>
                <?php 
                if (!$expense_reports) {
                    echo '<br>No Expenses Found ' .'<br><br><a href="expense_report.php">try again</a>';
                } else {
                   echo '<tr>';
                echo '<th id="id" class="center">S/N</th>';
                echo '<th id="type">type</th>';
                echo '<th>item name</th>';
                echo '<th id="date">date</th>';
                echo '<th id="description">Description</th>';
                echo '<th style="text-align: right" id="amount">amount</th>';
                echo '</tr>';
                $total = 0;
                foreach ($expense_reports as $item) {
                    $total+= $item['expense_Cost'];
                    echo '<tr>';
                    echo '<td>'.$item['userexpense_ID'] .'</td>';
                    echo '<td>'.$item['type'] .'</td>';
                    echo '<td>'.$item['expense_Item'].'</td>';
                    echo '<td>'.$item['expense_Date'].'</td>';
                    echo '<td>'.$item['description'].'</td>';
                    echo '<td style="text-align: right" id="amount">'.'₦'.$item['expense_Cost'].'</td>';
                    echo '</tr>';
                } 
                }
                ?>
                <tr>
                <th><strong>Total</strong></th>
                <td><strong><?php echo $total;?></strong></td>
                </tr>     
                </table>
            </div>
            </div>
        </section>
    </main>

<?php include 'includes/footer.php'?>