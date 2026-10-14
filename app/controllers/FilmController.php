<?php
class FilmController
{
    public function __construct(private Film $model) {}

    public function index(): void
    {
        $films = $this->model->getAll();
        require __DIR__ . '/../views/film/index.php';
    }

    public function create(): void
    {
        require __DIR__ . '/../views/film/create.php';
    }

    public function store(): void
    {
        [$data, $errors] = $this->validateInput($_POST);

        if ($errors) {
            $this->flash('error', implode(' ', $errors));
            $this->redirect('index.php?page=film&action=create');
        }

        try {
            $this->model->insert($data);
            $this->flash('success', 'Film berhasil ditambahkan.');
        } catch (PDOException $e) {
            $this->flash('error', $this->dbErrorMessage($e));
        }

        $this->redirect('index.php?page=film');
    }

    public function edit(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        $film = $this->model->findById($id);

        if (!$film) {
            http_response_code(404);
            exit('Data film tidak ditemukan.');
        }

        require __DIR__ . '/../views/film/edit.php';
    }

    public function update(): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        [$data, $errors] = $this->validateInput($_POST);

        if ($errors) {
            $this->flash('error', implode(' ', $errors));
            $this->redirect('index.php?page=film&action=edit&id=' . $id);
        }

        try {
            $this->model->update($id, $data);
            $this->flash('success', 'Film berhasil diperbarui.');
        } catch (PDOException $e) {
            $this->flash('error', $this->dbErrorMessage($e));
        }

        $this->redirect('index.php?page=film');
    }

    public function delete(): void
    {
        $id = (int) ($_POST['id'] ?? 0);

        try {
            $this->model->delete($id);
            $this->flash('success', 'Film berhasil dihapus.');
        } catch (PDOException $e) {
            $this->flash('error', 'Gagal menghapus film.');
        }

        $this->redirect('index.php?page=film');
    }

    private function validateInput(array $input): array
    {
        $data = [
            'judul'       => trim($input['judul'] ?? ''),
            'genre'       => trim($input['genre'] ?? ''),
            'tahun_rilis' => trim($input['tahun_rilis'] ?? ''),
            'negara'      => trim($input['negara'] ?? ''),
            'rating'      => trim($input['rating'] ?? '')
        ];

        $errors = [];

        if (in_array('', $data, true)) {
            $errors[] = 'Judul, genre, tahun rilis, negara, dan rating wajib diisi.';
        } else {
            $tahunMax = (int) date('Y') + 5;
            if (!ctype_digit($data['tahun_rilis'])
                || (int) $data['tahun_rilis'] < 1900
                || (int) $data['tahun_rilis'] > $tahunMax) {
                $errors[] = "Tahun rilis harus berupa angka antara 1900 dan $tahunMax.";
            }
            if (!is_numeric($data['rating'])
                || (float) $data['rating'] < 0
                || (float) $data['rating'] > 10) {
                $errors[] = 'Rating harus berupa angka antara 0 dan 10.';
            }
        }

        return [$data, $errors];
    }

    private function dbErrorMessage(PDOException $e): string
    {
        if ($e->getCode() === '23000') {
            return 'Gagal menyimpan: film dengan judul dan tahun yang sama sudah ada.';
        }
        return 'Gagal memproses data. Silakan coba lagi.';
    }

    private function flash(string $type, string $msg): void
    {
        $_SESSION['flash'] = ['type' => $type, 'msg' => $msg];
    }

    private function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }
}
?>