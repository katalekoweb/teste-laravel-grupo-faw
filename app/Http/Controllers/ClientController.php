<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function __construct(public ClientService $clientService)
    {
    }

    public function index()
    {
        $clients = Client::query()->when(request('search'), function ($query) {
            $search = request('search');
            $query->where('nome', 'like', "%{$search}%")->orWhere('telefone', 'like', "%{$search}%");
        })->paginate(10)->withQueryString();

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        $client = new Client();
        $client->estado = 1;

        return view('clients.form', compact('client'));
    }

    public function store(ClientRequest $request)
    {
        $client = $this->clientService->store($request->validated());
        return redirect()->route('clients.index')->with('success', 'Cliente criado com sucesso.');
    }

    public function show(Client $client)
    {
        return view('clients.form', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.form', compact('client'));
    }

    public function update(ClientRequest $request, Client $client)
    {
        $this->clientService->update($client, $request->validated());
        return redirect()->route('clients.index')->with('success', 'Cliente actualizado com sucesso.');
    }

    public function destroy(Client $client)
    {
        $this->clientService->destroy($client);
        return redirect()->route('clients.index')->with('success', 'Cliente eliminado com sucesso.');
    }
}
