<?php
include('includes/dbconnection.php');

function set_bool_value_to_zero($con, $table_name, $primary_key_column, $primary_key_value) {
  $query = "UPDATE $table_name SET bool = 0 WHERE $primary_key_column = '$primary_key_value'";
  if(mysqli_query($con, $query)) {
    return true;
  } else {
    return false;
  }
}

if(isset($_GET['removeid'])){
  $removeid=$_GET['removeid'];
  $drop_constraint = "ALTER TABLE tblcouriertracking DROP FOREIGN KEY refrenceid";
  mysqli_query($con, $drop_constraint);
  $add_constraint = "ALTER TABLE tblcouriertracking
                     ADD CONSTRAINT refrenceid
                     FOREIGN KEY (CourierId)
                     REFERENCES tblcourier (ID)
                     ON DELETE CASCADE";
  mysqli_query($con, $add_constraint);
  $delete_tracking = "DELETE FROM tblcouriertracking WHERE CourierId IN (SELECT ID FROM tblcourier WHERE SenderBranch = '$removeid')";
  mysqli_query($con, $delete_tracking);
  $delete_courier = "DELETE FROM tblcourier WHERE SenderBranch = '$removeid'";
  mysqli_query($con, $delete_courier);
  
  if(set_bool_value_to_zero($con, 'tblbranch', 'ID', $removeid)) {
    header("Location: manage-branch.php");
  }
  else{
    echo "Error: ".mysqli_error($con);
  }
}
?>
