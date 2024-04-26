<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Repository\ClientRepository;
use App\services\ApiColombiaDepartmentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class ClientController extends Controller
{
    public function __construct(
       private readonly Client $client,
       private readonly ApiColombiaDepartmentService $departmentService,
       private ClientRepository $clientRepository
    ){
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $clientWin = $this->clientRepository->getRandomClient();
        $clients = Client::paginate(10);
        return view('client.index', compact('clients','clientWin' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        $clients = Client::paginate(5);
        $departments = $this->departmentService->getDepartments();
        return view('client.create', compact('departments', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request): RedirectResponse
    {
        $this->client->create($request->all());
        return redirect()->route('home');
    }


}
