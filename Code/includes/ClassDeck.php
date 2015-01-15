<?php

class Deck {
    
    public $player1 = array();
    public $player2 = array();
    public $player2_build_y = 25;
    
    public $deck = array(
          array(
               Suit => "Clubs",
               Card => "Ace"
          ),
          array(
              Suit => "Clubs",
              Card => "King"
          ),
          array(
              Suit => "Clubs",
              Card => "Queen"
          ),
          array(
              Suit => "Clubs",
              Card => "Jack"
          ),
          array(
              Suit => "Clubs",
              Card => 10
          ),
          array(
              Suit => "Clubs",
              Card => 9
          ),
          array(
              Suit => "Clubs",
              Card => 8
          ),
          array(
              Suit => "Clubs",
              Card => 7
          ),
          array(
              Suit => "Clubs",
              Card => 6
          ),
          array(
              Suit => "Clubs",
              Card => 5
          ),
          array(
              Suit => "Clubs",
              Card => 4
          ),
          array(
              Suit => "Clubs",
              Card => 3
          ),
          array(
              Suit => "Clubs",
              Card => 2
          ),
          array(
              Suit => "Diamonds",
              Card => "Ace"
          ),
          array(
              Suit => "Diamonds",
              Card => "King"
          ),
          array(
              Suit => "Diamonds",
              Card => "Queen"
          ),
          array(
              Suit => "Diamonds",
              Card => "Jack"
          ),
          array(
              Suit => "Diamonds",
              Card => 10
          ),
          array(
              Suit => "Diamonds",
              Card => 9
          ),
          array(
              Suit => "Diamonds",
              Card => 8
          ),
          array(
              Suit => "Diamonds",
              Card => 7
          ),
          array(
              Suit => "Diamonds",
              Card => 6
          ),
          array(
              Suit => "Diamonds",
              Card => 5
          ),
          array(
              Suit => "Diamonds",
              Card => 4
          ),
          array(
              Suit => "Diamonds",
              Card => 3
          ),
          array(
              Suit => "Diamonds",
              Card => 2
          ),
          array(
              Suit => "Hearts",
              Card => "Ace"
          ),
          array(
              Suit => "Hearts",
              Card => "King"
          ),
          array(
              Suit => "Hearts",
              Card => "Queen"
          ),
          array(
              Suit => "Hearts",
              Card => "Jack"
          ),
          array(
              Suit => "Hearts",
              Card => 10
          ),
          array(
              Suit => "Hearts",
              Card => 9
          ),
          array(
              Suit => "Hearts",
              Card => 8
          ),
          array(
              Suit => "Hearts",
              Card => 7
          ),
          array(
              Suit => "Hearts",
              Card => 6
          ),
          array(
              Suit => "Hearts",
              Card => 5
          ),
          array(
              Suit => "Hearts",
              Card => 4
          ),
          array(
              Suit => "Hearts",
              Card => 3
          ),
          array(
              Suit => "Hearts",
              Card => 2
          ),
          array(
              Suit => "Spades",
              Card => "Ace"
          ),
          array(
              Suit => "Spades",
              Card => "King"
          ),
          array(
              Suit => "Spades",
              Card => "Queen"
          ),
          array(
              Suit => "Spades",
              Card => "Jack"
          ),
          array(
              Suit => "Spades",
              Card => 10
          ),
          array(
              Suit => "Spades",
              Card => 9
          ),
          array(
              Suit => "Spades",
              Card => 8
          ),
          array(
              Suit => "Spades",
              Card => 7
          ),
          array(
              Suit => "Spades",
              Card => 6
          ),
          array(
              Suit => "Spades",
              Card => 5
          ),
          array(
              Suit => "Spades",
              Card => 4
          ),
          array(
              Suit => "Spades",
              Card => 3
          ),
          array(
              Suit => "Spades",
              Card => 2
          ),
      );
      
     
      public function shuffle_deck(){
          shuffle($this->deck);
      }
      

      public function getDeck(){
          return $this->deck;
      }
      

      
      
      public function compare($player1, $player2){
          $player1 = self::convert($player1);
		  $player2 = self::convert($player2);
		  
		  if($player1 > $player2)
		  	return 1;
		
		  else if($player2 > $player1)
		  	return 2;
			
		  else
		  	return 3;
		  
      }
      
      
      public function convert($player){
      
      if(is_int($player))
          return $player;
        
      else if($player == "Ace")
          return 14;
      
      else if($player == "King")
          return 13;
        
      else if($player == "Queen")
          return 12;
        
      else if($player == "Jack")
          return 11;
        
      else 
          return 0;
      
      }
      
}

?>