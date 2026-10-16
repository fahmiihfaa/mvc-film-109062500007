<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Film</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="wrap">
        <header class="hero">
            <div>
                <p class="kicker">Now Showing</p>
                <h1>Daftar Film</h1>
                <p class="count"><?= count($films) ?> film dalam koleksi</p>
            </div>
            <a class="btn btn-gold" href="index.php?page=film&action=create">+ Tambah Film</a>
        </header>

        <?php require __DIR__ . '/../partials/flash.php'; ?>

        <div class="card">
            <div class="table-scroll">
                <table class="film">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Genre</th>
                            <th>Tahun</th>
                            <th>Negara</th>
                            <th>Rating</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($films)): ?>
                        <tr>
                            <td colspan="6" class="kosong">Belum ada film. Klik "Tambah Film" untuk memulai.</td>
                        </tr>
                        <?php endif; ?>

                        <?php foreach ($films as $f): ?>
                        <?php
                            $r = (float) $f['rating'];
                            $kelas = $r >= 8.5 ? 'rating-top' : ($r >= 8.0 ? 'rating-good' : 'rating-ok');
                        ?>
                        <tr>
                            <td class="judul"><?= htmlspecialchars($f['judul']) ?></td>
                            <td>
                                <?php foreach (explode(',', $f['genre']) as $g): ?>
                                    <span class="chip"><?= htmlspecialchars(trim($g)) ?></span>
                                <?php endforeach; ?>
                            </td>
                            <td class="tahun"><?= htmlspecialchars($f['tahun_rilis']) ?></td>
                            <td><?= htmlspecialchars($f['negara']) ?></td>
                            <td><span class="rating <?= $kelas ?>"><?= htmlspecialchars($f['rating']) ?></span></td>
                            <td>
                                <div class="aksi">
                                    <a class="btn btn-ghost btn-sm"
                                       href="index.php?page=film&action=edit&id=<?= (int) $f['id'] ?>">Edit</a>
                                    <form method="post"
                                          action="index.php?page=film&action=delete"
                                          onsubmit="return confirm('Hapus film ini?')">
                                        <input type="hidden" name="id" value="<?= (int) $f['id'] ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <p class="foot">MVC PHP NATIVE &bull; DATA FILM</p>
    </div>
</body>
</html>