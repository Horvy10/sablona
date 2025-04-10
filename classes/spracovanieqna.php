<?php
namespace otazkyodpovede;

require_once(__ROOT__ . '/db/config.php');

class QnA {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllQnA() {
        $sql = "SELECT otazky, odpovede FROM qna";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function ulozitSpravu($meno, $email, $sprava) {
        $sql = "INSERT INTO kontakt_formular (meno, email, sprava)
                VALUES (:meno, :email, :sprava)";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute([
                ':meno' => $meno,
                ':email' => $email,
                ':sprava' => $sprava
            ]);
            http_response_code(200);
            return true;
        } catch (\Exception $e) {
            http_response_code(500);
            return false;
        }
    }
}
