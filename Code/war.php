<?php
require "includes/Constants.php";
require "includes/ClassWar.php";

if(isset($_POST['fileName']) && !empty($_POST['fileName'])){

$war = new War;

//Receive User's File Name
$filename = preg_replace('/[^a-zA-Z0-9\s]/', '', $_POST['fileName']);

//Check if the name exist in the directory OR if the user entered a valid name
if($filename == NULL){
	header("Refresh:2; url=index.php");
	die("Please enter a valid file name! You are being redirected now. ");
}

if(file_exists('warGames/'.$filename.'.txt')){
	header("Refresh:2; url=index.php");
	die("This file name already exist! Try Again. You are being redirected now. ");
}


//Create file with the file name provided.
$filename = "warGames/" . $filename . ".txt";
$newfile = fopen($filename, "w");

$war->play($newfile);
$war->displayWinner($newfile);

fclose($newfile);

die("<br>Play Again? <a href='index.php'>Yes!</a>");


}

else
	header("location: index.php");
