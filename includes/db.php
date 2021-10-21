<?php
$conn= new mysqli("localhost", "root", "", "devdraver");

if($conn->connect_error){
   exit('Error connecting to database');
}