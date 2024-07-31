<?php
class USER
{
    private $db;

    public function __construct($con)
    {
        $this->db = $con;
    }
    public function register($umail, $upass)
    {
        try {
            $new_password = password_hash($upass, PASSWORD_BCRYPT);
            $stmt = $this->db->prepare("INSERT INTO users (user_mail, user_pass) VALUES (:umail, :upass)");
            $stmt->execute(array(':umail' => $umail, ':upass' => $new_password));

            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function login($umail, $upass)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE user_mail = :umail");
            $stmt->execute(array(':umail' => $umail));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() > 0) {
                if (password_verify($upass, $userRow['user_pass'])) {
                    $_SESSION['user_session'] = $userRow['ID'];
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function is_loggedin()
    {
        if (isset($_SESSION['user_session'])) {
            return true;
        }
    }
    public function redirect($url)
    {
        header("Location: $url");
    }
    public function logout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }
}
