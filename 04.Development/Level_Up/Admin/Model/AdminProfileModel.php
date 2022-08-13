<?php

require_once ('dbConnection.php');

class AdminProfileModel extends DBConnect {

    public function __construct()
    { $this->pdo = $this->connect(); }


    public function get_admin_details ($admin_id) {

        /* Gets all info of a particular admin. */

        $stmt = $this->pdo->prepare(
            "SELECT * FROM m_admins WHERE id = :id"
        );
        $stmt->execute([':id' => $admin_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function change_status ($admin_id, $delete) {
        $stmt = $this->pdo->prepare(
            "UPDATE m_admins SET is_deleted = :new_status WHERE id = :id"
        );
        $stmt->execute([':new_status'=>$delete,':id' => $admin_id]);
    }
}

?>