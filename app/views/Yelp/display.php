<!doctype html>
<html>
<head>

 <title>Display Yelp</title>
</head>
<body>
<h1>Yelp</h1>

<?php //dd($restaurants); ?>

<?php foreach($restaurants as $restaurant): ?>
    <strong><?php echo $restaurant->restaurant_name; ?></strong> <br /><br/>
    <?php echo $restaurant->type; ?> <br /><br />
    <?php
    if($restaurant->facebook_page!=NULL){
        echo "Facebook page: <a href='http://facebook.com/" . $restaurant->facebook_page ."'> here</a><br /><br />";
    }
    else{
        echo "Not on Facebook <br /><br/>";
    }
    ?>
    <a href="/restaurants/<?php echo $restaurant->id ?>/reviews">View Reviews </a><br /><br />
    <hr>
<?php endforeach; ?>


</body>
</html>