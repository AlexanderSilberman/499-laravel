
<!doctype html>
<html>
<head>
	<title>DVD Search</title>
</head>
<body>

<form method="get" action="/dvds">
<div>
DVD Title:
	<input type="text" name="dvd_title" />
</div>
<div>
Genre:
    <select name="genre">
        <option value="ALL">ALL</option>
        <?php foreach ($genres as $genre) : ?>
            <option value="<?php echo $genre->id; ?>"> <?php echo $genre->genre_name; ?> </option>
        <?php endforeach; ?>
    </select>

</div>
<div>
        Rating:
    <select name="rating">
        <option value="ALL">ALL</option>
        <?php foreach ($ratings as $rating) : ?>
            <option value="<?php echo $rating->id; ?>"> <?php echo $rating->rating_name; ?> </option>
        <?php endforeach; ?>
    </select>
</div>

<div>
	<input type="submit" value="Search" />
</div>
</form>

</body>
</html>

