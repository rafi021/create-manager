<?php

namespace App\Services\Exporter;

use Illuminate\Support\Facades\Response;

class PendingCsvExport
{
    protected array $data;
    protected array $columns = [];
    protected bool $includeHeaders = true;
    protected string $delimiter = ',';
    protected CsvExporter $exporter;

    public function __construct(array $data, CsvExporter $exporter)
    {
        $this->data = $data;
        $this->exporter = $exporter;
    }

    public function columns(array $columns)
    {
        $this->columns = $columns;
        return $this;
    }

    public function noHeaders()
    {
        $this->includeHeaders = false;
        return $this;
    }

    public function delimiter(string $delimiter)
    {
        $this->delimiter = $delimiter;
        return $this;
    }

    public function download($filename = 'export.csv')
    {
        $content = $this->exporter->generate($this->data, $this->columns, $this->delimiter, $this->includeHeaders);

        return Response::make($content, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }
}
