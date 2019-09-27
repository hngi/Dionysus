<?php include 'includes/header.php'?>
<?php include 'includes/expense.php'?>
<?php include 'includes/sidebar.php'?>

        <main role="main">
            <section class="panel important1">
            <h2>Add a new item</h2>
            <?php if(isset($success))  echo $success  ?>
                    <div class="col-sm-12 mb-6">
                        <form class="col text-center needs-validation" novalidate onsubmit="validate()" method="POST">
                            <div class="col-md-12 mb-2">
                              <select name="type1" class="form-control" required>
                                  <option>Select Type</option>
                                  <option value="card">Card</option>
                                  <option value="cash">Cash</option>
                                  <option value="others">Others</option>
                              </select>
                            </div>

                              <div class="col-md-12 mb-2">
                                  <input type="text" placeholder="What did you spend on?" name="item-name" class="form-control" title="item-name" required>
                              </div>

                              <div class="col-md-12 mb-2">
                                  <input type="date" name="date" class="form-control" title="date" required>
                              </div>

                              <div class="col-md-12 mb-2">
                                  <input type="text" placeholder="Amount - How much?" name="amount" class="form-control" title="amount" required>
                              </div>

                              <div class="col-md-12 mb-2">
                              <textarea class="form-control" name="description" placeholder="Description"></textarea>
                              </div>

                              <div class="col-md-12 mb-2">
                                <button class="btn btn-primary text-center" name="submit" type="submit" id="submit">Add New Expense</button>
                            </div>
                        </form>
                    </div>
            </section>
            <section class="panel important1">
            <div class="col-sm-12 mb-6">
            <p></p>
            <h2>Recent Expenses</h2>
            <p></p>
            <p></p>
            <table>
                
                <?php 
                if (!$recent_items) {
                    echo 'You have no Recent Expenses';
                } else {
                   echo '<tr>';
                echo '<th id="type" class="center">type</th>';
                echo '<th>name</th>';
                echo '<th id="date">date</th>';
                echo '<th style="text-align: right" id="amount">amount</th>';
                echo '</tr>';
                foreach ($recent_items as $item) {
                    echo '<tr>';
                    echo '<td>'.$item['type'] .'</td>';
                    echo '<td>'.$item['expense_Item'].'</td>';
                    echo '<td>'.$item['expense_Date'].'</td>';
                    echo '<td>'.'₦'.$item['expense_Cost'].'</td>';
                    echo '</tr>';
                } 
                }
                ?>
                </table>
                <a href="view_expense.php" class="btn btn-primary text-center"> View All Expenses</a>
            </div>
        </section>
    </main>

    <script src="js/signup.js"></script>
    <?php include 'includes/footer.php'?>
