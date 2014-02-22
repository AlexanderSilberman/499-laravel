/**
 * Created by PhpStorm.
 * User: AlexSilberman
 * Date: 2/18/14
 * Time: 5:44 PM
 */

<?php if (Session::has("success")) : ?>
<p style="color:green;">
    <?php echo Session::get('success') ?>

</p>
<?php endif; ?>


}

<form action="<php echo url('songs')?>" method="post">
    Title: <input type="text" name="title">

    Artist:
    <select>
        <?php foreach ($artists as $artist) : ?>
        <option value="<?php echo $artist->id ?>">
            <?php echo $artist->artist_name ?>
        </option>
        <?php endforeach; ?>

    </select>

    <br />

    Genre:
    <select name=""genre">
    <?php foreach ($genres as $genre) : ?>
        <option value="<?php echo $artist->id ?>">
            <?php echo $artist->genre_name ?>
        </option>
    <?php endforeach; ?>
    </select>

    Price: <input type="text" name="price" >

    <input type="submit" value="Add">

</form>