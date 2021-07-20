@extends('layouts.app')

@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                {{ $errors->first() }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier <strong>Vente #{{ $vente->id }}</strong></div>

                    <div class="card-body">
                        <form action="{{ route('commercial.vente.update', $vente) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="stock" class="col-md-6 col-form-label">Entrepôt</label>
                                    <select name="stock" class="form-select">
                                        @foreach($stocks as $stock)
                                            <option value="{{ $stock->id }}"
                                            @if($vente->stock()->get()->pluck('id')->first() === $stock->id) selected @endif>
                                                {{ $stock->entrepot()->get()->pluck('localisation')->first() }},
                                                {{ $stock->arme()->get()->pluck('designation')->first() ?? $stock->produit()->get()->pluck('designation')->first() }},
                                                {{ $stock->qte }}</option>
                                        @endforeach
                                    </select>

                                    @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="transport" class="col-md-6 col-form-label">Transport</label>
                                    <select name="transport" class="form-select">
                                        @foreach($transports as $transport)
                                            <option value="{{ $transport->id }}"
                                            @if($vente->transport()->get()->pluck('id')->first() === $transport->id) selected @endif>
                                                {{ $transport->user()->get()->pluck('name')->first() }},
                                                {{ $transport->vehicule }}, {{ $transport->destination }} </option>
                                        @endforeach
                                    </select>

                                    @error('transport')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="client" class="col-md-6 col-form-label">Client</label>
                                    <select name="client" class="form-select">
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}"
                                            @if($vente->client()->get()->pluck('id')->first() === $client->id) selected @endif>{{ $client->nom }}</option>
                                        @endforeach
                                    </select>

                                    @error('client')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date" class="col-md-6 col-form-label">{{ __('Date de vente') }}</label>

                                <div class="col-md-12">
                                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') ?? $vente->date }}" required autocomplete="date" autofocus>

                                    @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="qte" class="col-md-6 col-form-label">{{ __('Quantité') }}</label>

                                <div class="col-md-12">
                                    <input id="qte" type="number" class="form-control @error('qte') is-invalid @enderror" name="qte" value="{{ old('qte') ?? $vente->qte }}" required autocomplete="qte" autofocus>

                                    @error('qte')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
