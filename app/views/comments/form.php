<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php print_r($id) ?>
    <form action="/comments/create/<?= $id ?>" method="post">
        <label for="comment">Comment</label>
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
        <button type="submit">Submit</button>
    </form>
</body>
</html>