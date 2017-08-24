<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$url = base_url();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Students Results</title>
        <link rel="stylesheet" href="localhost/patamarks_ci/resource/bootstrap-3.3.7/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="localhost/patamarks_ci/resource/bootstrap-3.3.7/css/bootstrap.css">
        <link rel="stylesheet" href="localhost/patamarks_ci/resource/css/style.css">
        <link type="text/css" href="style.css" rel="stylesheet" />
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
                }
                .table { display: table; width: 100%; border-collapse: collapse; }
                 tr { display: table-row; }
                td { display: table-cell; border: 1px solid black; padding: 1em; }
            
        </style>
</head>
<body>
<div class="container">

<table class="table table-hover table-bordered ">
  <tr >
  <th>UNIT CODE</th>
  <th>CAT1</th>
  <th>CAT2</th>
  <th>MAIN EXAM</th>
  <th>FINAL GRADE</th>
  </tr>
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
</body>
</html>