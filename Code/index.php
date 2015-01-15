<?php
require "includes/Constants.php";
require "includes/ClassWar.php";

/* Class Variables 
$war = new War;

$war->war();

$war->displayWinner();

echo "<br>";

//$war->displayBattle(); */





?>


<html>

<body style="text-align:center;padding-top: 10%">

Please enter a file name to store each round of the game war! <span style="color:red; font-weight:bold">Only strings and numbers are valid!</span> <br /> <br />

<form action="war.php" method="post" style="text-align: center; ">
File Name: <input type="text" name="fileName" /><br /><br />
<input type="submit" value="Start Game" />
</form>
</body>


</html>
