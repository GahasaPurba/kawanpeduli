<?php

namespace App\Exports;

use App\Post;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class PostsExport implements FromQuery, WithHeadings, WithMapping, WithColumnFormatting, ShouldAutoSize
{
    use Exportable;

    public function query()
    {
        return Post::query();
    }

    public function headings(): array
    {
        return [
            'Judul',
            'Kategori',
            'Author',
            'Tanggal Dibuat',
        ];
    }

    public function map($posts): array
    {
        return [
            $posts->title,
            $posts->category->name,
            $posts->user->name,
            Date::dateTimeToExcel($posts->created_at),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
