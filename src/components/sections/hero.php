<?php if (!empty($articles)): ?>
<section class="hero">
    <?php foreach ($articles as $article): ?>
        <h1><?php echo htmlspecialchars($article['title']); ?></h1>
        <p><?php echo htmlspecialchars($article['content']); ?></p>
    <?php endforeach; ?>
</section>
<?php endif; ?>
