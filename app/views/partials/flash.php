<?php if (!empty($_SESSION['flash'])): ?>
    <?php $flash = $_SESSION['flash']; unset($_SESSION['flash']); ?>
    <p style="padding:8px; border:1px solid;
              background:<?= $flash['type'] === 'success' ? '#d4edda' : '#f8d7da' ?>">
        <?= htmlspecialchars($flash['msg']) ?>
    </p>
<?php endif; ?>