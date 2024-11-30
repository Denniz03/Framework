<?php if (!empty($articles)): ?>
<section class="articles">
    <h2>Latest Articles</h2>
    <ul>
        <?php foreach ($articles as $article): ?>
            <li>
                <h3><?php echo htmlspecialchars($article['title']); ?></h3>
                <p><?php echo htmlspecialchars($article['content']); ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
<?php endif; ?>
