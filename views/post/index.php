<?php

use App\Helpers\Text;
use App\Model\Post;

$pdo = new PDO('mysql:dbname=tutoblog;host=127.0.0.1', 'sylvanito', 'sylvanito', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    $query = $pdo->query('SELECT * FROM post ORDER BY created_at DESC LIMIT 12');

    $posts = $query->fetchAll(PDO::FETCH_CLASS, Post::class);

?>

<h1>Mon Blog</h1>

<div class="row">
    <?php foreach($posts as $post): ?>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= htmlentities($post->getName()) ?></h5>
                <p>
                    <?=  $post->getExcerpt(); ?>
                </p>
                <p class="text-muted"><?= $post->getCreatedAt()->format('d/m/Y') ?></p>
                <p><a href="http://" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Voir Plus</a></p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>