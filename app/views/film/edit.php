<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Film</title>
</head>
<body>
    <h2>Edit Film</h2>

    <?php require __DIR__ . '/../partials/flash.php'; ?>

    <form method="post" action="index.php?page=film&action=update">
        <input type="hidden" name="id" value="<?= (int) $film['id'] ?>">

        <label>Judul</label><br>
        <input type="text" name="judul"
               value="<?= htmlspecialchars($film['judul']) ?>" required><br><br>

        <label>Genre</label><br>
        <input type="text" name="genre"
               value="<?= htmlspecialchars($film['genre']) ?>" required><br><br>

        <label>Tahun Rilis</label><br>
        <input type="number" name="tahun_rilis"
               value="<?= htmlspecialchars($film['tahun_rilis']) ?>" required><br><br>

        <label>Negara</label><br>
        <input type="text" name="negara"
               value="<?= htmlspecialchars($film['negara']) ?>" required><br><br>

        <label>Rating (0-10)</label><br>
        <input type="number" name="rating" step="0.1" min="0" max="10"
               value="<?= htmlspecialchars($film['rating']) ?>" required><br><br>

        <button type="submit">Update</button>
        <a href="index.php?page=film">Kembali</a>
    </form>
</body>
</html>