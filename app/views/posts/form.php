<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/form.css">
</head>

<body>
    <div class="form">
        <form action="/post/create" method="post">
            <label for="title">Create Your Post</label>
            <input type="text" name="title" id="title" placeholder="TITLE">
            <textarea name="content" id="content" cols="30" rows="10" placeholder="CONTENT"></textarea>
            <label for="category">Category</label>
            <input type="text" name="category" id="category">
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>