<?php

namespace App\Parser;

class JsonParser implements ParserInterface
{
    public function parse(string $path): array
    {
        $json = file_get_contents($path);
        return json_decode($json, true);
    }
}


