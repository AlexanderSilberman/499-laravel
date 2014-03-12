<!doctype html>
<html>
<head>

 <title>Display Yelp Reviews</title>
</head>
<body>
<h1>Yelp</h1>

<?php //dd($reviews);
//dd($restaurants);
 ?>

<h2><strong>Reviews for <?php echo $restaurants->restaurant_name; ?> </strong></h2><br />

<?php 
if($facebook!=NULL){
	echo "<strong>Facebook Activity:</strong> <br/>";
	echo "<ul>";
	echo "<li>Likes: ". $facebook->checkins. "</li>"; 
	echo "<li>Checkins: ". $facebook->likes."</li>";
	echo "</ul>";
}

?>

<?php foreach($reviews as $review): ?>
	<hr>
    <?php for($i=0; $i<$review->rating;$i++){
		echo "<img height='10' width='10' src='http://robertjustinronald.edublogs.org/files/2013/05/star-wkuuk7.png' />";
	}?> <br /> <br />
    
    <?php echo $review->review_description; ?><br /> <br />
    
<?php endforeach; ?>


</body>
</html>