<!doctype html>
<html>
<head>
	<title>DVD List</title>
</head>
<body>

<h1>DVD Search</h1>
<table border="2">
    <tr><td>Title</td><td>Rating</td><td>Genre</td><td>Label</td><td>Sound</td><td>Format</td><td>Release Date</td></tr>
<?php foreach ($dvds as $dvd) : ?>
    <tr>
        <td> <?php echo $dvd->title ?>  </td>
        <td> <?php echo $dvd->rating_name ?>  </td>
        <td> <?php echo $dvd->genre_name ?>  </td>
        <td> <?php echo $dvd->label_name ?>  </td>
        <td> <?php echo $dvd->sound_name ?>  </td>
        <td> <?php echo $dvd->format_name ?>  </td>

        <?php $date=date_create($dvd->release_date); ?>

        <td> <?php echo DATE_FORMAT($date, 'M d Y') ?>  </td>

    </tr>
<?php endforeach; ?>
</table>

</body>
</html>