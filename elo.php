<?php

function newRating($player1_rating,$player2_rating,$result,$k_value=32,$should_round=True) {
   #Assign actual individual results
   $player1_result = $result;
   $player2_result = 1 - $result;

   #Calculate expected results
   $player1_expectation = 1/(1+pow(10,(($player2_rating - $player1_rating)/400.0)));
   $player2_expectation = 1/(1+pow(10,(($player1_rating - $player2_rating)/400.0)));

   #Calculate new ratings
   $player1_new_rating = $player1_rating + ($k_value*($player1_result - $player1_expectation));
   $player2_new_rating = $player2_rating + ($k_value*($player2_result - $player2_expectation));

   #Optional rounding
   if ($should_round) {
      # int rounds down and forces type
      $player1_new_rating = (int) $player1_new_rating;
      $player2_new_rating = (int) $player2_new_rating; 
   }

   # Create a dictionary to return and do so!
   $new_ratings['player1'] = $player1_new_rating;
   $new_ratings['player2'] = $player2_new_rating;
   return $new_ratings;
}

class RatedPlayer {
    public function RatedPlayer($id,$rating) {
        $this->id = $id;
        $this->rating = $rating;
   }
}

class Match {
    public function Match($player1,$player2,$result) {
      $ratings_after_match = newRating($player1->rating,$player2->rating,$result);
      $player1->rating = $ratings_after_match['player1'];
      $player2->rating = $ratings_after_match['player2'];
   }
}

 
# OOP
$tom = new RatedPlayer("Tom",1600);
$alan = new RatedPlayer("Alan",2000);
echo 'OOP<br>';
echo $tom->rating;
echo '<br>';
echo $alan->rating;
echo '<br>';
new Match($tom,$alan,1);
echo $tom->rating;
echo '<br>';
echo $alan->rating;
echo '<br>';



echo 'PROCEDURAL<br>';
$tomRating = 1600;
$alanRating = 2000;

echo $tomRating;
echo '<br>';
echo $alanRating;
echo '<br>';
$after_match_ratings = newRating($tomRating,$alanRating,1);
$tomRating = $after_match_ratings["player1"];
$alanRating = $after_match_ratings["player2"];
echo $tomRating;
echo '<br>';
echo $alanRating;
echo '<br>';




?>







