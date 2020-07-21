<?php

include 'Client.php';
include 'Formatter.php';

abstract class DataManager
{

    public static function importAndReadData($inputFile)
    {
        $importData = [];
        foreach ($inputFile as $line) {
            $importData[] = explode(',', trim($line));
        }

        //Removing and formatting header array from the rest of the data.
        $headers = Formatter::removeQuotes(array_shift($importData));

        //Main export content string that will be written into output file.
        $exportContent = "\n";

        foreach ($importData as $client) {
            $client = Formatter::removeQuotes($client);

            $sortedData = [];

            //Making associative array with headers and respective properties.
            for ($i = 0; $i < count($headers); $i++) {
                $sortedData[$headers[$i]] = $client[$i];
            }

            //Assigning properties to new Client class object.
            $newClient = new Client
            (
                $sortedData['name'],
                $sortedData['surname'],
                $sortedData['address'],
                $sortedData['city'],
                $sortedData['gender'],
                $sortedData['soc_security_num']
            );

            //Adding Client info as a new line to export content.
            $exportContent .= Formatter::formatOutputData($newClient) . PHP_EOL;
        }

        self::exportData(rtrim($exportContent));
    }

    public static function exportData(string $contentToAdd)
    {
        $exportFile = fopen('output_data.csv', 'a');
        fwrite($exportFile, $contentToAdd);
        fclose($exportFile);
    }
}