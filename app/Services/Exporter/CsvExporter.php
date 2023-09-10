<?php

namespace App\Services\Exporter;

class CsvExporter
{
    public function from(array $data): PendingCsvExport
    {
        return new PendingCsvExport($data, $this);
    }

    public function generate(array $data, array $columns, string $delimiter = ',', bool $includeHeaders = true): string
    {
        $output = fopen('php://temp', 'r+');

        if ($includeHeaders && !empty($data) && !empty($columns)) {
            fputcsv($output, $columns, $delimiter);
        }

        foreach ($data as $row) {
            $selectedData = [];
            foreach ($columns as $column) {
                $selectedData[] = $row[$column] ?? null;
            }
            fputcsv($output, $selectedData, $delimiter);
        }

        rewind($output);
        $csvContent = stream_get_contents($output);
        fclose($output);

        return $csvContent;
    }
}
