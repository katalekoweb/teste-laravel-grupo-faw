<?php

namespace App\Services;

use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClientService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store (array $data): Client {
        try {
            return DB::transaction(function () use ($data) {
                return Client::query()->create($data);
            });
        } catch (\Throwable $th) {
            Log::error('Erro ao registar cliente', ['error' => $th->getMessage(), 'data' => $data]);
            throw $th;
        }
    }

    public function update (Client $client, array $data): Client {
        try {
            return DB::transaction(function () use ($client, $data) {
                $client->update($data);
                return $client;
            });
        } catch (\Throwable $th) {
            Log::error('Erro ao actualizar cliente', ['error' => $th->getMessage(), 'client_id' => $client->id, 'data' => $data]);
            throw $th;
        }
    }

    public function destroy (Client $client): void {
        try {
            DB::transaction(function () use ($client) {
                $client->delete();
            });
        } catch (\Throwable $th) {
            Log::error('Erro ao eliminar cliente', ['error' => $th->getMessage(), 'client_id' => $client->id]);
            throw $th;
        }
    }
}
