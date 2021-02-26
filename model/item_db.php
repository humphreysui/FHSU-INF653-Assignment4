<?php
  
  function get_todoitems_by_category($category_id) { 
    global $db;
    if ($category_id == NULL || $category_id == FALSE) { 
      // return all items when $category_id is null or false
      $query = 'SELECT * FROM todoitems 
                ORDER BY ItemNum';
      $statement = $db->prepare($query);
      $statement->execute();
      $todoitems = $statement->fetchAll(); 
      $statement->closeCursor(); 
      return $todoitems;
    } else{
      $query = 'SELECT * FROM todoitems
              WHERE todoitems.categoryID = :category_id 
              ORDER BY ItemNum';
      $statement = $db->prepare($query);
      $statement->bindValue(':category_id', $category_id); 
      $statement->execute();
      $todoitems = $statement->fetchAll(); 
      $statement->closeCursor(); 
      return $todoitems;
    }    
  }
  
  function get_product($ItemNum) { 
    global $db;
    $query = 'SELECT * FROM todoitems WHERE ItemNum = :ItemNum'; 
    $statement = $db->prepare($query);
    $statement->bindValue(':ItemNum', $ItemNum); 
    $statement->execute(); 
    $todoitems = $statement->fetch(); 
    $statement->closeCursor(); 
    return $todoitems;
  }
  
  function delete_todoitem($ItemNum) { 
    global $db;
    $query = 'DELETE FROM todoitems
    WHERE ItemNum = :ItemNum'; 
    $statement = $db->prepare($query);
    $statement->bindValue(':ItemNum', $ItemNum); 
    $statement->execute(); 
    $statement->closeCursor();
  }
  
  function add_todoitem($category_id, $Title, $Description) { 
    global $db;
    $query = 'INSERT INTO todoitems (categoryID, Title, Description) VALUES
    (:category_id, :Title, :Description)'; 
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id); 
    $statement->bindValue('Title', $Title); 
    $statement->bindValue(':Description', $Description); 
    $statement->execute(); 
    $statement->closeCursor();
  } 
