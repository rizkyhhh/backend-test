<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    private function getParsedData()
    {
        $response = Http::get('https://bit.ly/48ejMhW');

        if (!$response->successful()) {
            return [];
        }

        $body = $response->json();

        if (!isset($body['DATA'])) {
            return [];
        }

        $raw = $body['DATA'];
        $lines = explode("\n", $raw);
        $headers = explode("|", array_shift($lines));

        $data = array_filter(array_map(function ($line) use ($headers) {
            $fields = explode("|", $line);
            return count($fields) === count($headers) ? array_combine($headers, $fields) : null;
        }, $lines));

        return $data;
    }

    public function search(Request $request)
    {
        $field = $request->query('field');
        $query = $request->query('query');

        // Validate field
        if (!in_array($field, ['NAMA', 'NIM', 'YMD'])) {
            return response()->json(['error' => 'Invalid search field. Use NAMA, NIM, or YMD.'], 422);
        }

        $data = collect($this->getParsedData());
        $results = $data->where($field, $query);

        return response()->json($results->values());
    }

}


