<?php

abstract class Formatter
{

    public static function removeQuotes($data): array
    {
        $result = [];
        foreach ($data as $text) {
            $result[] = trim($text, "”/“/' '");
        }
        return $result;
    }

    public static function formatOutputData(Client $client): string
    {
        return
            '”' . $client->name . '”,' .
            '”' . $client->surname . '”,' .
            '”' . $client->address . '”,' .
            '”' . $client->city . '”,' .
            '”' . $client->gender . '”,' .
            '”' . $client->soc_security_num . '”';
    }
}