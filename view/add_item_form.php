<?php include '../view/header.php'; ?> 

<main>
  <h1>Add Item</h1>
  <section>
    <form class="add_item_form" action="." method="post" id="add_item_form">
      <input type="hidden" name="action" value="add_item">
      
      <label>Category:</label>
      <select name="category_id">
        <?php foreach ($categories as $category) : ?>
        <option value="<?php echo $category['categoryID']; ?>">
          <?php echo $category['categoryName']; ?>
        </option>
        <?php endforeach; ?>
      </select><br>

      <label>Title:</label>
      <input type="text" name="Title"><br>

      <label>Description:</label>
      <input type="text" name="Description"><br>

      <label>&nbsp;</label>
      <input type="submit" value="Add Item"><br>
    </form>
    <div class="last_paragraph">
      <p><a href="index.php">View To Do List</a></p>
    </div>
  </section>
  
</main>

<?php include '../view/footer.php'; ?> 