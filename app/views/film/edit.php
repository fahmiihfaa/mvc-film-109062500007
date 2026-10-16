<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Film</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="wrap narrow">
        <?php require __DIR__ . '/../partials/flash.php'; ?>

        <div class="ticket">
            <h1>Edit Film</h1>
            <p class="sub">Perbarui data tiket</p>

            <form method="post" action="index.php?page=film&action=update">
                <input type="hidden" name="id" value="<?= (int) $film['id'] ?>">

                <div class="field">
                    <label>Judul</label>
                    <input type="text" name="judul"
                           value="<?= htmlspecialchars($film['judul']) ?>" required>
                </div>

                <div class="field">
                    <label>Genre (pisahkan dengan koma)</label>
                    <input type="text" name="genre"
                           value="<?= htmlspecialchars($film['genre']) ?>" required>
                </div>

                <div class="row-2">
                    <div class="field">
                        <label>Tahun Rilis</label>
                        <input type="number" name="tahun_rilis"
                               value="<?= htmlspecialchars($film['tahun_rilis']) ?>" required>
                    </div>
                    <div class="field">
                        <label>Rating (0-10)</label>
                        <input type="number" name="rating" step="0.1" min="0" max="10"
                               value="<?= htmlspecialchars($film['rating']) ?>" required>
                    </div>
                </div>

                <div class="field">
                    <label>Negara</label>
                    <input type="text" name="negara"
                           value="<?= htmlspecialchars($film['negara']) ?>" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-gold">Update</button>
                    <a class="btn btn-ghost" href="index.php?page=film">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>