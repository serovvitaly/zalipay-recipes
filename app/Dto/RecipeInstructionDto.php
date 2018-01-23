<?php

namespace App\Dto;


class RecipeInstructionDto
{
    protected $stepNum;
    protected $text;
    protected $mediaUrl;

    public function __construct(int $stepNum, string $text, string $mediaUrl = '')
    {
        $this->stepNum = $stepNum;
        $this->text = trim($text);
        $this->mediaUrl = trim($mediaUrl);
    }

    public function stepNum(): int
    {
        return $this->stepNum;
    }

    public function text(): string
    {
        return $this->text;
    }

    public function mediaUrl(): string
    {
        return $this->mediaUrl;
    }
}
