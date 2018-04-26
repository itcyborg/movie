<div>
    <form action="upload" enctype="multipart/form-data" method="post" id="upload">
        Title: <input type="text" class="form-control" name="name"><br>
        Genre:<select class="form-control" name="genre">
            <?php echo $options; ?>
        </select><br>
        File: <input type="file" name="file" id="file"><br>
        <label for="actors">Actors</label>
        <textarea name="actors" id="actors" cols="30" rows="10" class="form-control"></textarea><br>
        <input type="submit" class="btn btn-primary" value="submit">
    </form>
</div>