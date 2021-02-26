<?php 
  require('../model/database.php');
  require('../model/category_db.php');
  require('../model/item_db.php');

  $action = filter_input(INPUT_POST, 'action'); 
  if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action'); 
    if ($action == NULL) {
      $action = 'list_items'; 
    } 
  }

  switch ($action) { 
    case 'list_items':
      $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
      $category_name = get_category_name($category_id); 
      $categories = get_categories();
      $todoitems = get_todoitems_by_category($category_id); 
      include('../view/item_list.php');  
      break;
  
    case 'delete_item':
      $ItemNum = filter_input(INPUT_POST, 'ItemNum', FILTER_VALIDATE_INT);
      $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
      if ($category_id == NULL || $category_id == FALSE || $ItemNum == NULL || $ItemNum == FALSE) { 
        $error = "Missing or incorrect item id or category id."; 
        include('../view/error.php');
      } else { 
        delete_todoitem($ItemNum); 
        header("Location: .?category_id=$category_id"); 
      } 
      break; 
    
    case 'add_item_form':
      $categories = get_categories(); 
      include('../view/add_item_form.php');  
      break;
    
    case 'show_add_category_form':
      $categories = get_categories(); 
      include('../view/category_list.php');  
      break;
   
    case 'add_item':
      $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
      $Title = filter_input(INPUT_POST, 'Title'); 
      $Description = filter_input(INPUT_POST, 'Description'); 
      if ($category_id == NULL || $category_id == FALSE || $Title == NULL || $Title == NULL || $Description == NULL || $Description == FALSE) { 
        $error = "Invalid item data. Check all fields and try again."; 
        include('../view/error.php');
      } else {
        add_todoitem($category_id, $Title, $Description); 
        header("Location: .?category_id=$category_id");
      } 
      break;
    
    case 'delete_category':
      $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
      if ($category_id == null || $category_id == false) {
        $error = "Invalid category ID.";
        include('../view/error.php');
      } else {
        delete_category($category_id);
        header("Location: .?category_id=$category_id");
      }
      break;

    case 'add_category':
      $category_name = filter_input(INPUT_POST, 'name');
      if ($category_name == null || $category_name == false) {
        $error = "Invalid category ID.";
        include('../view/error.php');
      } else {
        add_category($category_name);
        header("Location: .?category_id=$category_id");
      }
      break;
  }