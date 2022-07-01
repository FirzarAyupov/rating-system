<?php

class Rating
{
    private int $id;
    private int $point;
    private string $comment;
    private DateTime $date;
    private RatingCategory $category;
    private User $user;
    private User $author;

    public function __construct(User $user, RatingCategory $category, int $point, User $author, string $comment = '')
    {
        $this->user = $user;
        $this->category = $category;
        $this->point = $point;
        $this->date = new DateTime();
        $this->comment = $comment;
        $this->author = $author;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPoint(): int
    {
        return $this->point;
    }

    public function setPoint($point)
    {
        $this->point = $point;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function getCategory(): RatingCategory
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }
}
