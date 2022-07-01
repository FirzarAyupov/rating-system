<?php

require_once "RatingCategory.php";

class RatingProvider
{
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getRatingCategories(): array
    {
        $statement = $this->pdo->prepare(
            'SELECT
                `id`,
                `name`,
                `parent_id`,
                `default_points`,
                `is_category`
            FROM `rating_category`'
        );

        $statement->execute();

        // $request = $statement->fetchAll(PDO::FETCH_CLASS, RatingCategory::class);
        $request = $statement->fetchAll(PDO::FETCH_ASSOC);

        function CreateTree(array $array, int $sub = 0)
        {
            $a = [];
            foreach ($array as $v) {
                if ($sub == $v['parent_id']) {
                    $b = CreateTree($array, $v['id']);
                    if (!empty($b)) {
                        $a[$v['name']] = ['id' => $v['id'], $b];
                    } else
                        $a[$v['name']] = ['id' => $v['id'], null];
                }
            }
            return $a;
        }

        return CreateTree($request);
    }

    public function addCategory(RatingCategory $category): bool
    {

        $statement = $this->pdo->prepare(
            'INSERT INTO rating_category (name, parent_id, default_points, is_category) VALUES (:name, :parent_id, :default_points, :is_category)'
        );

        return $statement->execute([
            'name' => $category->getName(),
            'parent_id' => $category->getParent_id(),
            'default_points' => 0,
            'is_category' => 1
        ]);
    }
}
