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
}
?>