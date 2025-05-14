<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExchangeRateController extends Controller
{
    public function show(Request $request)
    {
        $base = $request->query('base', 'USD');
     
        $currencies = ['EUR', 'GBP', 'JPY', 'AUD', 'CAD', 'USD'];
        $to = implode(',', $currencies);


        $response = Http::get("https://api.frankfurter.app/latest", [
            'from' => $base,
            'to' => $to,
        ]);


        if (!$response->ok()) {
            return view('exchange-rates', [
                'error' => 'Could not fetch exchange rates.',
                'rates' => [],
                'base' => $base,
                'currencies' => $currencies,
            ]);
        }

        $data = $response->json();

        return view('exchange-rates', [
            'rates' => $data['rates'] ?? [],
            'base' => $base,
            'currencies' => $currencies,
            'date' => $data['date'] ?? null,
            'error' => null,
        ]);
    }
}
