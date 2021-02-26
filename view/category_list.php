<?php include '../view/header.php'; ?> 

<main>
  <h1>Category List</h1>
  <section>
    <table>
      <tr>
        <th>Name</th>
        <th>&nbsp;</th>
      </tr>  

      <?php foreach ($categories as $category) : ?>
      <tr>
        <td><?php echo $category['categoryName']; ?></td>
        <td class="remove">
          <form action="." method="post">
            <input type="hidden" name="action" value="delete_category">
            <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>"/>
            <input type="submit" value="Remove"/>
          </form>
        </td>
      </tr>
      <?php endforeach; ?>  

    </table>
  
    <h2>Add Category</h2>
    <form action="." method="post" id="add_category">

      <label>Name:</label>
      <input type="text" name="name" />
      <input type="hidden" name="action" value="add_category">
      <input id="add_category_button" type="submit" value="Add Category"/>
    </form>
    <div class="last_paragraph">
      <p><a href="index.php">View My To Do list</a></p>
    </div>
  </section>

</main>

<?php include '../view/footer.php'; ?>  