<?php 
//include ("includes/header.php");

 defined('BASEPATH') OR exit('No direct script access allowed');
 //var_dump($results);
 ?>
 <div class="container">
<table class="table table-hover table-bordered">
  <tr >
  <th>UNIT CODE</th>
  <th>CAT1</th>
  <th>CAT2</th>
  <th>MAIN EXAM</th>
  <th>FINAL GRADE</th>
  </tr>
  <tr >
  <?php
	  foreach($results as $result){
	  	echo "<tr>";
	  	echo "<td>" . $result->unit_id . "</td>";
	  	//echo "<td>" . $result->unit_code . "</td>"; 
	  	echo "<td>" . $result->cat1 . "</td>";
	  	echo "<td>" . $result->cat2 . "</td>"; 
	  	echo "<td>" . $result->main_exam . "</td>";
	  	echo "<td>" . $result->grade . "</td>";
	  	echo "</tr>";
	  }
  ?>

</table>
