<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/../public/css/form.css">
</head>

<body>
    <div class="form">
        <?php foreach ($data as $key => $value): ?>
            <form action="/post/edit/<?php echo $value['id'] ?>" method="post">

                <label for="title">Create Your Post</label>
                <input type="text" name="title" id="title" placeholder="TITLE" value="<?= $value['title'] ?>">
                <textarea name="content" id="content" cols="30" rows="10"
                    placeholder="CONTENT"><?= $value['content'] ?></textarea>
                <label for="category">Category</label>
                <input type="text" name="category" id="category" value="<?= $value['category'] ?>">
                <button type="submit">Submit</button>
            </form>
        <?php endforeach; ?>
    </div>
</body>

</html>