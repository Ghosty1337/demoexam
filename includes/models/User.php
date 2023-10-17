<?php
class User
{
    private string $fcs;
    private string $login;
    private string $hash_password;
    private string $email;
    private string $phone;
    private int $is_Admin;

    public function __construct(string $login, string $password, string $fcs, string $phone, string $email, int $is_Admin = 0)
    {
        $this->fcs = $fcs;
        $this->login = $login;
        $this->hash_password = password_hash($password, PASSWORD_DEFAULT);
        $this->phone = $phone;
        $this->email = $email;
        $this->is_Admin = $is_Admin;
    }

    public function signUp(PDO $db): bool
    {
        $res = $db->query("SELECT COUNT(*) FROM users WHERE users.login like '$this->login' or users.email like '$this->email'")->fetch();
        if ($res["COUNT(*)"] > 0) {
            return false;
        } else {
            return $db->exec("INSERT INTO users (fcs, login, password, phone, email, is_Admin) VALUES ('$this->fcs', '$this->login', '$this->hash_password', '$this->phone', '$this->email', '$this->is_Admin')");
        }
    }

    public static function signIn(string $login, string $password, PDO $db)
    {
        $login = strtolower($login);
        $res = $db->query("SELECT * FROM users WHERE users.login like '$login'")->fetch();
        if (!empty($res["id"])) {
            if (password_verify($password, $res["password"])) {
                return $res;
            } else {
                return 'Пароль неверный!';
            }
        } else {
            return 'Пользователя с таким логином несуществует!';
        }
    }

    public function getInfo()
    {
        return [
            "fcs" => $this->fcs,
            "login" => $this->login,
            "hash_password" => $this->hash_password,
            "email" => $this->email,
            "phone" => $this->phone,
            "is_Admin" => $this->is_Admin
        ];
    }
}
