<?php

class TextFilter
{
    private $allowedTags = [];
    private $bannedWords = [];
    private $censorReplacements = [];

    public function __construct(array $options = [])
    {
        $this->allowedTags = $options['allowedTags'] ?? [];
        $this->bannedWords = $options['bannedWords'] ?? [];
        $this->censorReplacements = $options['censorReplacements'] ?? [];
    }

    public function filter($text)
    {
        $text = strip_tags($text, implode('', $this->allowedTags));
        $text = $this->replaceBannedWords($text);
        $text = $this->censor($text);
        return $text;
    }

    private function replaceBannedWords($text)
    {
        foreach ($this->bannedWords as $word) {
            $text = str_ireplace($word, '', $text);
        }
        return $text;
    }

    private function censor($text)
    {
        foreach ($this->censorReplacements as $find => $replace) {
            $text = str_ireplace($find, $replace, $text);
        }
        return $text;
    }

    // Add other methods for sanitization, validation, etc. as needed
}
