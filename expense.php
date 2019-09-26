<?php include 'includes/header.php'?>
<?php include 'includes/sidebar.php'?>

        <main role="main">
            <section class="panel important">
                <h2>Add a new item</h2>
            </section>
            <section class="panel important">
            <div class="row">
            <div id="form-box">
<form>
<div class="col-md-12 mb-6">
     <label for="type1">Type:</label>
      <select name="type1">
          <option value="card">Card</option>
          <option value="cash">Cash</option>
          <option value="cryptocoin">Cryptocoin</option>
          <option value="other">Other</option>
      </select>
     <div class="invalid-feedback">Please enter your email</div>
    </div>

  <div>
    <span>Name:</span> <input type="text" name="item-name" placeholder="What did you spend on?">
  </div>

  <div>
    <span>Date:</span> <input type="date" name="date">
  </div>

  <div>
    <span>Amount:</span> <input type="number" name="amount" placeholder="How much?">
  </div>

</form>
</div>
            </section>
        </main>

<?php include 'includes/footer.php'?>
