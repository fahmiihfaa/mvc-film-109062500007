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
}
?>