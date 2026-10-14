<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Film</title>
</head>
<body>
    <h2>Daftar Film</h2>

    <?php require __DIR__ . '/../partials/flash.php'; ?>

    <a href="index.php?page=film&action=create">Tambah Film</a><br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Judul</th>
            <th>Genre</th>
            <th>Tahun</th>
            <th>Negara</th>
            <th>Rating</th>
        </tr>
        <?php foreach ($films as $f): ?>
        <tr>
            <td><?= htmlspecialchars($f['judul']) ?></td>
            <td><?= htmlspecialchars($f['genre']) ?></td>
            <td><?= htmlspecialchars($f['tahun_rilis']) ?></td>
            <td><?= htmlspecialchars($f['negara']) ?></td>
            <td><?= htmlspecialchars($f['rating']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>