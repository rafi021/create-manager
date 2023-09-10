<?php

namespace App\Parser;

use Illuminate\Support\Manager;

class ParserManager extends Manager
{
    public function getDefaultDriver()
    {
        return 'json';
    }

    public function createJsonDriver()
    {
        return new JsonParser();
    }

    public function createCsvDriver()
    {
        return new CsvParser();
    }

    public function createXmlDriver()
    {
        return new XmlParser();
    }
}
