<?php

namespace App\Model;

use App\Helpers\Text;
use DateTime;

class Post {

    private $id;

    private $name;

    private $content;

    private $created_at;

    public function getName(): ?string 
    {
        return $this->name;
    }

    public function getExcerpt(): ?string
    {
        if ($this->content === null) return null;

        return nl2br(htmlentities(Text::excerpt($this->content)));
    }

    public function getCreatedAt(): DateTime
    {
        return new DateTime($this->created_at);
    }
}