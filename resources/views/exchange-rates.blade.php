@extends('layouts.app')

@section('title', 'Exchange Rates')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="mb-4 text-center">Exchange Rates</h2>
                    <form method="GET" action="{{ route('exchange.rates') }}" class="mb-4">
                        <div class="row g-2 align-items-center">
                            <div class="col-auto">
                                <label for="base" class="col-form-label">Base currency:</label>
                            </div>
                            <div class="col-auto">
                                <select name="base" id="base" class="form-select">
                                    @foreach(['USD', 'EUR', 'GBP', 'JPY', 'AUD', 'CAD'] as $currency)
                                        <option value="{{ $currency }}" @if($base == $currency) selected @endif>
                                            {{ $currency }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Show Rates</button>
                            </div>
                        </div>
                    </form>

                    @if($error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @else
                        <p class="text-muted">Rates as of: <strong>{{ $date }}</strong></p>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Currency</th>
                                    <th>Rate (1 {{ $base }})</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($currencies as $currency)
                                    @if($currency !== $base)
                                        <tr>
                                            <td>{{ $currency }}</td>
                                            <td>
                                                {{ $rates[$currency] ?? 'N/A' }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
