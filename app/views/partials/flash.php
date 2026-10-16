<?php if (!empty($_SESSION['flash'])): ?>
    <?php $flash = $_SESSION['flash']; unset($_SESSION['flash']); ?>
    <div class="flash flash-<?= $flash['type'] === 'success' ? 'success' : 'error' ?>">
        <span><?= $flash['type'] === 'success' ? '✔' : '✖' ?></span>
        <span><?= htmlspecialchars($flash['msg']) ?></span>
    </div>
<?php endif; ?>