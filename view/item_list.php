

<?php include '../view/header.php'; ?> 
<main>

  <!-- view categories -->
  <form action="." method="get">
    <input type="hidden" name="action" value="list_items">      
    <label>Category:</label>
    <select name="category_id">
      <option selected value=".">View All Categories</option>
      <?php foreach ($categories as $category) : ?>
      <option value="<?php echo $category['categoryID']; ?>">
      <?php echo $category['categoryName']; ?>
      </option>
      <?php endforeach; ?>
      
    </select>
    <label>&nbsp;</label>
    <input type="submit" value="Submit"><br>
  </form>
  <section>
    <table> 
      <tr>
        <th>Title</th> 
        <th>Description</th>
        <!-- <th class="right">Price</th>  -->
        <th>&nbsp;</th>
      </tr>
      <?php foreach($todoitems as $todoitem) : ?> 
      <tr>
        <td><?php echo $todoitem['Title']; ?></td> 
        <td><?php echo $todoitem['Description']; ?></td> 
        <!-- call get_category_name function here to get categories in the tables --> 
        <td>
          <?php 
            $category_id = $todoitem['categoryID'];
            $name = get_category_name($category_id);
            echo $name;  
          ?>
        </td> 
        <td class="remove">
          <form action="." method="post"> 
            <input type="hidden" name="action" value="delete_item">
            <input type="hidden" name="ItemNum" value="<?php echo $todoitem['ItemNum']; ?>"> 
            <input type="hidden" name="category_id" value="<?php echo $todoitem['categoryID']; ?>"> 
            <input type="submit" value="Remove">
          </form>
        </td> 
      </tr> 
      <?php endforeach; ?> 
    </table>
    <div class="last_paragraph">
      <p><a href="?action=add_item_form">Click here</a> to add a new item to the list.</p>
      <a href="?action=show_add_category_form">View/Edit Categories</a>
    </div>
  </section> 
</main> 

<?php include '../view/footer.php'; ?> 