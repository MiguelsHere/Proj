<?php

class Common
{
    static function is_mod($conn): bool
    {
        if (!($_SESSION['is_mod'])) {
            return false;
        }

        try {
            $query = "SELECT is_mod FROM user WHERE user_id = :user_id";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":user_id", $_SESSION['user_id']);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row && $row['is_mod'] == 1) {
                return true;
            }
        } catch (PDOException $e) {
            print($e->getMessage());
            $_SESSION['alert'] = "Erro, tente novamente.";
            return false;
        }
        return false;
    }
}