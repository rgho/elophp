elojs
======
Author: Rishi Ghosh 

A PHP implementation of the ELO Player Rating system. The single function below handles all aspects of calculating the new ELO ratings for both players. Object Oriented and procedural use are both supported.


newRating [function]
-------------
+   Description: Returns an array with keys "Player1" and "Player2" holding corresponding new ELO ratings.
+   Examples: No examples yet.
+   Parmeters: 
    +   player1_rating: Rating of Player1 right before match.
    +   player2_rating: Rating of Player2 right before match.
    +   k_value: The constant K-value used in developers ELO system. Read the wikipedia article on ELO for details.
    +   result: The result of the match on a scale of 0 to 1. "0" = Player1 lost, Player 2 won. "0.5" = Draw. "1" = Player 1 won, Player 2 lost.
    +	should_round: Set to "true" by default. Rounds the output ratings.


Examples:
-------------

```php
# Object Oriented Example:
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


# Procedural Example:
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
```
