<?php
require_once('db.php');


//format arrays
function formatcode($arr){

   echo'<pre>';
   print_r($arr);
   echo'</pre>';

}
//select statment

function selectAll(){
   global $conn;
   $data= array();
   $stmt= $conn->prepare('SELECT * FROM employees');
   $stmt->execute();
   $result= $stmt->get_result();
   if($result->num_rows === 0) echo ('No rows');
   while($row=$result->fetch_assoc()) {
      $data[]=$row;
   }
   $stmt->close();
   return $data;
}


//select single statment
function selectSingle($id= NULL){
   global $conn;
   $stmt= $conn->prepare('SELECT * FROM employees WHERE id = ?');
   $stmt->bind_param('i', $id);
   $stmt->execute();
   $result= $stmt->get_result();
   if($result->num_rows === 0) echo ('No rows');
   $row=$result->fetch_assoc();
   $stmt->close();
   return $row;

}


//insert statment
function insert($fname= NULL, $lname= NULL, $phone= NULL){
 global $conn;
 $stmt= $conn->prepare('INSERT INTO employees (fname, lname, phone) VALUES(?, ?, ?)');
 $stmt->bind_param("sss", $fname, $lname, $phone);
 $stmt->execute();
 $stmt->close();
}