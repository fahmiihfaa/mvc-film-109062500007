<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Film</title>
</head>
<body>
    <h2>Tambah Film</h2>

    <?php require __DIR__ . '/../partials/flash.php'; ?>

    <form method="post" action="index.php?page=film&action=store">
        <label>Judul</label><br>
        <input type="text" name="judul" required><br><br>

        <label>Genre</label><br>
        <input type="text" name="genre" required><br><br>

        <label>Tahun Rilis</label><br>
        <input type="number" name="tahun_rilis" required><br><br>

        <label>Negara</label><br>
        <input type="text" name="negara" required><br><br>

        <label>Rating (0-10)</label><br>
        <input type="number" name="rating" step="0.1" min="0" max="10" required><br><br>

        <button type="submit">Simpan</button>
        <a href="index.php?page=film">Kembali</a>
    </form>
</body>
</html>