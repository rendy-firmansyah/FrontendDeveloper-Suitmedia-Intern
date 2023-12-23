<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
// use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ConsumAPIController extends Controller
{
    public function index() {
        $perPage = Request::get('perPage', 10);
        $page = Request::get('page', 1);
        $sort = Request::get('sort');

        $client = new Client();

        $response = $client->request('GET', 'https://suitmedia-backend.suitdev.com/api/ideas', [
            'query' => [
                'page[number]' => $page,
                'page[size]' => $perPage,
                'append' => ['small_image', 'medium_image'],
                'sort' => '-published_at'
            ],
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ]
        ]);

        $statusCode = $response->getStatusCode();

        if ($statusCode === 200) {
            $data = json_decode($response->getBody(), true);
            // dd($data);
            $ideasData = $data['data'];

            // Sorting
            if ($sort === 'oldest') {
                usort($ideasData, function ($a, $b) {
                    return strtotime($a['published_at']) - strtotime($b['published_at']);
                });
            } else {
                usort($ideasData, function ($a, $b) {
                    return strtotime($b['published_at']) - strtotime($a['published_at']);
                });
            }

            // Pagination
            $totalCount = $data['meta']['total'] ?? 0;

            $currentPage = $page;
            $items = $ideasData;
            $perPage = $perPage;
            $total = count($ideasData);

            $currentPageItems = array_slice($ideasData, ($currentPage - 1) * $perPage, $perPage);
            $paginator = new LengthAwarePaginator($currentPageItems, $totalCount, $perPage, $currentPage, [
                'path' => Paginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]);

            return view('index', compact('ideasData', 'paginator', 'sort'));

        } else {
            return "Gagal mengambil data. Kode Status: " . $statusCode;
        }
    }
}
