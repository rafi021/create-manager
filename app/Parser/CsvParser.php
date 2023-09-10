<?php

namespace App\Parser;

class CsvParser implements ParserInterface
{
    public function parse(string $path): array
    {
        $file = fopen($path, 'r');
        $rows = [];

        while (($row = fgetcsv($file)) !== false) {
            $rows[] = $row;
        }

        fclose($file);

        return $rows;
    }
}

