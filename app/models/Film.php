<?php
class Film
{
    public function __construct(private PDO $db) {}

    public function getAll(): array
    {
        $stmt = $this->db->query(
            'SELECT id, judul, genre, tahun_rilis, negara, rating
             FROM film ORDER BY judul'
        );
        return $stmt->fetchAll();
    }

    public function findById(int $id): array|false
    {
        $stmt = $this->db->prepare(
            'SELECT id, judul, genre, tahun_rilis, negara, rating
             FROM film WHERE id = :id'
        );
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function insert(array $data): bool
    {
        $sql = 'INSERT INTO film (judul, genre, tahun_rilis, negara, rating)
                VALUES (:judul, :genre, :tahun, :negara, :rating)';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':judul'  => $data['judul'],
            ':genre'  => $data['genre'],
            ':tahun'  => $data['tahun_rilis'],
            ':negara' => $data['negara'],
            ':rating' => $data['rating']
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $sql = 'UPDATE film
                SET judul = :judul, genre = :genre, tahun_rilis = :tahun,
                    negara = :negara, rating = :rating
                WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id'     => $id,
            ':judul'  => $data['judul'],
            ':genre'  => $data['genre'],
            ':tahun'  => $data['tahun_rilis'],
            ':negara' => $data['negara'],
            ':rating' => $data['rating']
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM film WHERE id = :id');
        return $stmt->execute([':id' => $id]);
    }
}
?>