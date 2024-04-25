<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct(
       private readonly Client $client,
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
    public function create()
    {
        return view('client');
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
