<?php

namespace App\Parser;

use App\Parser\ParserInterface;

class XmlParser implements ParserInterface
{
    public function parse(string $path): array
    {
        $xml = simplexml_load_file($path);

        return $this->parseNode($xml);
    }

    private function parseNode($node) {
        $arr = [];

        foreach ($node->children() as $child) {
            $childName = $child->getName();

            $childValue = count($child->children()) > 0 ? $this->parseNode($child) : strval($child);

            if (!isset($arr[$childName])) {
                $arr[$childName] = $childValue;
            } else {
                if (!is_array($arr[$childName]) || !isset($arr[$childName][0])) {
                    $arr[$childName] = [$arr[$childName]];
                }
                $arr[$childName][] = $childValue;
            }
        }

        return $arr;
    }
}
