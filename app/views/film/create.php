<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Film</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="wrap narrow">
        <?php require __DIR__ . '/../partials/flash.php'; ?>

        <div class="ticket">
            <h1>Tambah Film</h1>
            <p class="sub">Tiket masuk koleksi</p>

            <form method="post" action="index.php?page=film&action=store">
                <div class="field">
                    <label>Judul</label>
                    <input type="text" name="judul" required>
                </div>

                <div class="field">
                    <label>Genre (pisahkan dengan koma)</label>
                    <input type="text" name="genre" placeholder="Drama, Romance" required>
                </div>

                <div class="row-2">
                    <div class="field">
                        <label>Tahun Rilis</label>
                        <input type="number" name="tahun_rilis" required>
                    </div>
                    <div class="field">
                        <label>Rating (0-10)</label>
                        <input type="number" name="rating" step="0.1" min="0" max="10" required>
                    </div>
                </div>

                <div class="field">
                    <label>Negara</label>
                    <input type="text" name="negara" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-gold">Simpan</button>
                    <a class="btn btn-ghost" href="index.php?page=film">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>