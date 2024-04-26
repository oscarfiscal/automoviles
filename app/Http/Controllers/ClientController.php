<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\services\ApiColombiaDepartmentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class ClientController extends Controller
{
    public function __construct(
       private readonly Client $client,
       private readonly ApiColombiaDepartmentService $departmentService
    ){
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        $departments = $this->departmentService->getDepartments();
        return view('client', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request): RedirectResponse
    {
        $this->client->create($request->all());
        return redirect()->route('/');
    }


}
