<?php 
include('includes/db/db_config.php');
include('includes/functions/functions.php');
include('includes/header.php');
include('includes/sidebar.php');
$allexpenses = getAllUserItems($conn, $_SESSION['userid']);
?>

<main role="main">
<section class="panel important">
            <div class="col-sm-12 mb-6">
            <p></p>
            <h2>All Expenses</h2>
            <p></p>
            <p></p>
            <table>
                
                <?php 
                if (!$allexpenses) {
                    echo 'You have no Recent Expenses';
                } else {
                   echo '<tr>';
                echo '<th id="id" class="center">S/N</th>';
                echo '<th id="type">type</th>';
                echo '<th>item name</th>';
                echo '<th id="date">date</th>';
                echo '<th id="description">Description</th>';
                echo '<th style="text-align: right" id="amount">amount</th>';
                echo '</tr>';
                foreach ($allexpenses as $item) {
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
                </table>
            </div>
        </section>
    </main>

<?php include 'includes/footer.php'?>