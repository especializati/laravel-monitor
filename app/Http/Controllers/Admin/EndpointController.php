<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEndpointRequest;
use App\Models\Endpoint;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EndpointController extends Controller
{
    public function index(string $siteId)
    {
        $site = Site::with('endpoints.check')->find($siteId);
        if (!$site) {
            return back();
        }
        $this->authorize('owner', $site);
        // if (Gate::allows('owner', $site)) {
        // if (Gate::denies('owner', $site)) {
        //     return back();
        // }

        $endpoints = $site->endpoints;

        return view('admin.endpoints.index', compact('site', 'endpoints'));
    }

    public function create(string $siteId)
    {
        if (!$site = Site::find($siteId)) {
            return back();
        }
        $this->authorize('owner', $site);

        return view('admin.endpoints.create', compact('site'));
    }

    public function store(StoreUpdateEndpointRequest $request, Site $site)
    {
        $this->authorize('owner', $site);
        $site->endpoints()->create($request->all());

        return redirect()
            ->route('endpoints.index', $site->id)
            ->with('message', 'Cadastrado com sucesso');
    }

    public function edit(Site $site, Endpoint $endpoint)
    {
        $this->authorize('owner', $site);
        return view('admin.endpoints.edit', compact('site', 'endpoint'));
    }

    public function update(StoreUpdateEndpointRequest $request, Site $site, Endpoint $endpoint)
    {
        $this->authorize('owner', $site);
        $endpoint->update($request->validated());

        return redirect()
            ->route('endpoints.index', $site->id)
            ->with('message', 'Atualizado com sucesso');
    }

    public function destroy(Site $site, Endpoint $endpoint)
    {
        $this->authorize('owner', $site);
        $endpoint->delete();

        return redirect()
            ->route('endpoints.index', $site->id)
            ->with('message', 'Deletado com sucesso');
    }
}
