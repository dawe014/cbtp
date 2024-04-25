<?php
include('assets/inc/config.php');
if(!empty($_POST["specilizationid"])) 
{

 $sql=mysqli_query($mysqli,"select doc_fname,doc_lname,doc_id from his_docs where doc_special='".$_POST['specilizationid']."'");?>
 <option selected="selected">Select Doctor </option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['doc_id']); ?>"><?php echo htmlentities($row['doc_fname'], $row['$doc_lname']); ?></option>
  <?php
}
}


if(!empty($_POST["doctor"])) 
{

 $sql=mysqli_query($mysqli,"select docFees from doctors where id='".$_POST['doctor']."'");
 while($row=mysqli_fetch_array($sql))
 	{?>
 <option value="<?php echo htmlentities($row['docFees']); ?>"><?php echo htmlentities($row['docFees']); ?></option>
  <?php
}
}

?>

