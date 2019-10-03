<?php 
include('includes/db/db_config.php');
include('includes/functions/functions.php');
include('includes/header.php');
include('includes/sidebar.php');
?>

<main role="main">
<section class="panel important">
            <div class="col-sm-12 mb-6">
            <p></p>
            <h2>Expense Reports</h2>
            <p></p>
            <p></p>
            <div class="col-sm-12 mb-12">
                        <form method="post" action="expense_report_details.php" name="expensereports">

                              <div class="col-md-4 mb-2">
                              <label for="fdate"><strong>from:</strong></label>
                                  <input type="date" name="fdate" class="form-control" title="fdate" required>
                              </div>

                              <div class="col-md-4 mb-2">
                              <label for="tdate"><strong>to:</strong></label>
                                  <input type="date" name="tdate" class="form-control" title="tdate" required>
                              </div>

                              <div class="col-md-4 mb-2">
                                <button class="btn btn-primary text-center" name="submit" type="submit" id="submit">Submit</button>
                            </div>
                        </form>
                    </div>
            </div>
        </section>
    </main>

<?php include 'includes/footer.php'?>