<?php


namespace App\Services\Other\Moderation;


use App\Models\BadWord;

class Censorship
{

    public function __construct()
    {
        $this->getStopWords();
    }

    public function getStopWords()
    {
        $badWords = BadWord::all();
        $words = $badWords->toArray();
        $word = array();
        foreach ($words as $item){
            array_push($word, $item['word']);
        }
        return $word;
    }

    public function filter($text)
    {
        foreach ($this->getStopWords() as $item){
            if (str_contains($text, $item)){
                return true;
            }
        }
        return false;
    }
}
