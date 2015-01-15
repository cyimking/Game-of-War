<?php
include "ClassDeck.php";

class War extends Deck{
	public $player1 = array();
	public $player2 = array();
	public $turns = 0;
	public $winner;
	public $warCards_p1 = array();
	public $warCards_p2 = array();
	
	/*
	* War Class Construct
	* Shuffle Deck, build player 1 and player 2
	*/
	public function __construct(){
		self::shuffle_deck();
		$this->player1 = self::buildPlayer1();
		$this->player2 = self::buildPlayer2();
	}
	
	/*
	* Build First Player's Deck
	* Add first 26 cards from the default deck into's players 1 deck
	* @return player1
	*/
 	public function buildPlayer1(){
          for($x = 0; $x < 26; $x++)
          	$this->player1[$x] = $this->deck[$x];
          
		  return $this->player1;    
      }
	
	/*
	* Build First Player's Deck
	* Add first 26 cards from the default deck into's players 1 deck
	* @return player2
	*/
     public function buildPlayer2(){
          for($x = 0; $x < 26; $x++){
          	$this->player2[$x] = $this->deck[$this->player2_build_y];
            $this->player2_build_y++;
            }
          
		  return $this->player2;
        }
		
	/*
	* Display Game Winner
	* 
	*/	
	public function displayWinner($file){
			if(count($this->player1) == 52){
				echo "<b><span style='color: blue'>The winner of this match is Player One!</span></b>";
				fwrite($file,"<b><span style='color: blue'>The winner of this match is Player One!</span></b>");
			}
			else if(count($this->player2) == 52){
				echo "<b><span style='color: green'>The winner of this match is Player Two!</span></b>";
				fwrite($file,"<b><span style='color: green'>The winner of this match is Player Two!</span></b>");
			}
			else{
				echo "<b><span style='color:red'>This game was a draw!</span></b>";
				fwrite($file,"<b><span style='color:red'>This game was a draw!</span></b>");
			}
		}
		
	/*
	* Add Pile
	* Add WarCard's Pile to the end of the winner's deck
	* @param $player
	* @param $pile
	*/
	public function addPile($player, $pile){		
		if($player == $this->player1){	
			for($x = 0; $x < sizeof($pile); $x++){				
				array_push($this->player1, $pile[$x]);
			}}
			
		else{	
			for($x = 0; $x < sizeof($pile); $x++){				
				array_push($this->player2, $pile[$x]);
			}}
		}
		
	/*
	* War Battle
	* Handle the War Battles
	*/
	public function war($file){
		 fwrite($file, "<span style='color: red'> War!</span>\r\n" . PHP_EOL);			
		
		//New War Battle
		if(!isset($this->warCards_p1) || !isset($this->warCards_p2))
			$i = 0;
		
		//We are continuing another war!	
		else
			$i = sizeof($this->warCards_p1);
			
		for($x = $i; $x < $i + 3; $x++){
			if(!isset($this->player1[$x])) $this->warCards_p1[$x] =$this->player1[$x - 1] ;
			if(!isset($this->player2[$x])) $this->warCards_p2[$x] =$this->player2[$x - 1];
			$this->warCards_p1[$x] = $this->player1[$x];
			$this->warCards_p2[$x] = $this->player2[$x];
			$topcardp1 = array_shift($this->player1);
			$topcardp2 = array_shift($this->player2);
			}
			
		$this->winner =  self::compare($this->warCards_p1[2 + $i]["Card"], $this->warCards_p2[2 + $i]["Card"]);
		
		if($this->winner == 1){
			fwrite($file, "Player 1 won this war!\r\n" . PHP_EOL);
			self::addPile($this->player1, $this->warCards_p1);
			self::addPile($this->player1, $this->warCards_p2);
			unset($this->warCards_p1);
			unset($this->warCards_p2);
			}
		
		else if($this->winner == 2){
			fwrite($file, "Player 2 won this war!\r\n" . PHP_EOL);
			self::addPile($this->player2, $this->warCards_p1);
			self::addPile($this->player2, $this->warCards_p2);
			unset($this->warCards_p1);
			unset($this->warCards_p2);
			}
		
		else
			self::war($file);
						
	}
		
	/*
	* Play
	* Play the game war
	*/
	public function play($file){
		while(true){
			if($this->turns == 250 ||sizeof($this->player1) == 0 || sizeof($this->player2) == 0 )
				break;
			
			fwrite($file,"<b>\r\nPlayer 1 Count: ". count($this->player1) . 
				 " : Player 2 Count: ". count($this->player2) . "</b>\r\n" . PHP_EOL);
				 
			$this->turns = 1 + $this->turns;
			fwrite($file,"<b>Turn " . $this->turns . "</b> : ");
			
			$this->winner = self::compare($this->player1[0]["Card"],$this->player2[0]["Card"]);
			
			//Player 1 won the turn
			if($this->winner == 1){
				fwrite($file, "<span style='color: blue'> Player 1 is the Winner of this Turn!</span>");
				array_push($this->player1,$this->player1[0], $this->player2[0] );
			
				 fwrite($file,"\r\n&nbsp; &nbsp; &nbsp; Player 1's Card: " . $this->player1[0]["Card"]
				. "\r\n&nbsp; &nbsp; &nbsp; Player 2's Card: " . $this->player2[0]["Card"]
				. "\r\n\r\n" . PHP_EOL);
				
				array_shift($this->player1);
				array_shift($this->player2);
				}
				
			//Player 2 won the turn	
			else if($this->winner == 2){
				fwrite($file,"<span style='color: green'> Player 2 is the Winner of this Turn!</span>");		
				array_push($this->player2,$this->player2[0], $this->player1[0] );
					
				fwrite($file, "\r\n&nbsp; &nbsp; &nbsp; Player 1's Card: " . $this->player1[0]["Card"]
				. "\r\n&nbsp; &nbsp; &nbsp; Player 2's Card: " . $this->player2[0]["Card"]
				. "\r\n\r\n" .  PHP_EOL);
				array_shift($this->player1);
				array_shift($this->player2);
				}
			
			//War		
			else 
				self::war($file); 
				
		}
	}

}

		
?>