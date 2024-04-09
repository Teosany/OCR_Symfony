<?php

namespace App\Entity;

use Psr\Log\LoggerInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Article
{
    private string $title;
    private string $author;
    private string $content;

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('title', new Assert\NotBlank());
        $metadata->addPropertyConstraint('content', new Assert\NotBlank());
        $metadata->addPropertyConstraint(
            'title',
            new Assert\Length(['min' => 10, 'minMessage' => "sdfsdf"])
        );
        $metadata->addGetterConstraint('passwordSafe', new Assert\IsTrue([
            'message' => 'Invaluable',
        ]));
    }

    public function isPasswordSafe(): bool
    {
//        dd();
        return $this->title != $this->content;
    }

    public function getAuthor()
    {
        return $this->author;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getContent()
    {
        return $this->content;
    }

    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}