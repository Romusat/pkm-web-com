<?php $video = $conn->query("SELECT * FROM video"); ?>
<div class="container mt-5">
    <h2>Video</h2>
    <?php while($v = $video->fetch_assoc()): ?>
    <iframe width="100%" height="300" src="<?= $v['link'] ?>"></iframe>
    <?php endwhile; ?>
</div>