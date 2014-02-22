<!doctype html>
<html>
<head>
	<title> Song List</title>
</head>
<body>

<h1>Song Search</h1>

<?php foreach ($songs as $song) : ?>
	<div class="song">
		<h4>
		<?php echo $song->title; ?> by <?php echo $song->artist_name; ?>
		</h4>
	<p>Genre: <?php echo $song->genre; ?></p>
	<p>Added: <?php echo $song->added; ?></p>
</div>
<?php endforeach; ?>


</body>
</html>