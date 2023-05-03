<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEndpointRequest;
use App\Models\Site;
use Illuminate\Http\Request;

class EndpointController extends Controller
{
    public function index(string $siteId)
    {
        $site = Site::with('endpoints')->find($siteId);
        if (!$site) {
            return back();
        }

        $endpoints = $site->endpoints;

        return view('admin.endpoints.index', compact('site', 'endpoints'));
    }

    public function create(string $siteId)
    {
        if (!$site = Site::find($siteId)) {
            return back();
        }

        return view('admin.endpoints.create', compact('site'));
    }

    public function store(StoreUpdateEndpointRequest $request, Site $site)
    {
        $site->endpoints()->create($request->all());

        return redirect()
                ->route('endpoints.index', $site->id)
                ->with('message', 'Cadastrado com sucesso');
    }
}
