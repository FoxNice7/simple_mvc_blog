<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/posts.css">
</head>

<body>
    <main>
        <?php if (empty($postData)): ?>
            <p>No posts, create first!!!</p>
            <a href="/post/create">Create</a>
        <?php else: ?>
            <div class="post">
                <?php foreach ($postData as $key => $value): ?>
                    <section class="post-section">
                        <div class="post-title">
                            <?= $value['title'] ?>
                        </div>
                        <div class="post-content">
                            <?= $value['content'] ?>
                        </div>
                        <div class="post-category">
                            <?= $value['category'] ?>
                            <?= $value['created_at'] ?>
                        </div>
                        <?php foreach ($commentsData as $key2 => $value2): ?>
                            <?php if ($value['id'] === $value2['post_id']): ?>
                                <div class="comments">
                                    <?= $value2['content'] ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <div class="action">
                            <a href="/comments/create/<?= $value['id'] ?>">Create Comment</a>
                            <a href="/post/delete/<?= $value['id'] ?>">Delete</a>
                            <a href="/post/edit/<?= $value['id'] ?>">Edit</a>
                        </div>
                    </section>
                <?php endforeach; ?>
            </div>
            <div class="add-post">
                <h5>Create new post!</h5>
                <a href="/post/create">Create</a>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>