<?php

class RatingCategory
{
    private int $id;
    private string $name;
    private int $parent_id;
    private int $default_points;
    private int $is_category;


    public function __construct(string $name, int $parent_id = 0, int $default_points = 0)
    {
        $this->name = $name;
        $this->parent_id = $parent_id;
        $this->default_points = $default_points;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getParent_id(): int
    {
        return $this->parent_id;
    }

    public function setParent_id($parent_id)
    {
        $this->parent_id = $parent_id;
    }

    public function getDefault_points(): int
    {
        return $this->default_points;
    }

    public function setDefault_points($default_points)
    {
        $this->default_points = $default_points;
    }

    public function getIs_category(): int
    {
        return $this->is_category;
    }

    public function setIs_category($is_category)
    {
        $this->is_category = $is_category;
    }
}
