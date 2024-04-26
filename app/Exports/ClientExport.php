<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class ClientExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Client::select(
            'id',
            'name',
            'last_name',
            'identification',
            'departament',
            'city',
            'phone',
            'email',
            'created_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'last_name',
            'identification',
            'departament',
            'city',
            'phone',
            'email',
            'created_at',
        ];
    }

    public function map($client): array
    {
        return [
            $client->id,
            $client->name,
            $client->last_name,
            $client->identification,
            $client->departament,
            $client->city,
            $client->phone,
            $client->email,
            Carbon::parse($client->created_at)->format('Y-m-d H:i:s'),
        ];
    }
}
