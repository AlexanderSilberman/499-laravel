<!DOCTYPE html>
<html>
<head>
<title>Create DVD </title>
</head>
<body>

<?php foreach ($errors->all() as $message) : ?>
    <p style="background-color: red;" >
    <?php echo $message ?>
    </p>
<?php endforeach ?>


<?php if (Session::has('success')) : ?>
    <p style="background-color: green;">
        <?php echo Session::get('success') ?>
    </p>
<?php endif; ?>

<form action="<?php echo url('dvds') ?>" method="post">
    Title: <input type="text" name="title" value="<?php echo Input::old('title') ?>" />

<br />

Genre:
<select name="genre">
<?php foreach ($genres as $genre) : ?>
    <option value="<?php echo $genre->id . '"';
    if($genre->id==Input::old('genre')){
        echo "selected";
    }

?> >
        <?php echo $genre->genre_name ?>
    </option>
<?php endforeach; ?>
</select>

<br />

    Rating:
    <select name="rating">
        <?php foreach ($ratings as $rating) : ?>

            <option value="<?php echo $rating->id . '"';

            if($rating->id==Input::old('rating')){
                echo "selected";

            }


            ?> >
                <?php echo $rating->rating_name ?>
            </option>
        <?php endforeach ?>
    </select>

    <br>

    Label:
    <select name="label">
        <?php foreach ($labels as $label) : ?>

            <option value="<?php echo $label->id . '"';
            if($label->id==Input::old('label')){
                echo "selected";

            }


            ?> >

                <?php echo $label->label_name ?>
            </option>
        <?php endforeach ?>
    </select>

    <br>

    Sound:
    <select name="sound">
        <?php foreach ($sounds as $sound) : ?>
            <option value="<?php echo $sound->id . '"';
            if($sound->id==Input::old('sound')){
                echo "selected";

            }


           ?>>
                <?php echo $sound->sound_name ?>
            </option>
        <?php endforeach ?>
    </select>

    <br>

    Format:
    <select name="format">
        <?php foreach ($formats as $format) : ?>
            <option value="<?php echo $format->id . '"';
            if($format->id==Input::old('format')){
                echo "selected";

            }


            ?>>
                <?php echo $format->format_name ?>
            </option>
        <?php endforeach ?>
    </select>

    <br>

<input type="submit" value="Create DVD">
</form>

</body>
</html>