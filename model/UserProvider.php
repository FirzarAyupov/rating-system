<?php

require_once "User.php";

class UserProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Проверка пользователя, возвращает объект пользователя если есть или null если нет
     */
    public function userVerification(string $login, string $password): ?User
    {
        $statement = $this->pdo->prepare(
            'SELECT
                `user`.`id`,
                `user`.`name` AS username,
                `user`.`login`,
                `user_has_role`.`role_id`,
                `role`.`name` as rolename
            FROM `user`
                LEFT JOIN `user_has_role` ON `user`.`id` = `user_has_role`.`user_id`
                LEFT JOIN `role` ON `role`.`id` = `user_has_role`.`role_id`
            WHERE `login` = :login AND `password` = :password LIMIT 1'
        );

        $statement->execute([
            'login' => $login,
            'password' => md5($password)
        ]);

        return $statement->fetchObject(User::class, [$login]) ?: null;
    }


    public function userRegistration(User $user, string $plainPassword): bool
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO user (name, login, password) VALUES (:name, :login, :password)'
        );

        return $statement->execute([
            'name' => $user->getUsername(),
            'login' => $user->getLogin(),
            'password' => md5($plainPassword)
        ]);
    }
}
