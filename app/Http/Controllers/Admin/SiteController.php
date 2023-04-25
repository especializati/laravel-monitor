<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSiteRequest;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        $sites = Site::get();

        return view('admin/sites/index', compact('sites'));
    }

    public function create()
    {
        return view('admin/sites/create');
    }

    public function store(StoreUpdateSiteRequest $request)
    {
        // $user = Auth::user();
        $user = auth()->user();
        $user->sites()->create($request->validated());

        return redirect()
                    ->route('sites.index')
                    ->with('message', 'Site Criado com sucesso');
    }

    public function edit(string $id)
    {
        if (!$site = Site::find($id)) {
            return back();
        }

        return view('admin/sites/edit', compact('site'));
    }

    public function update(StoreUpdateSiteRequest $request, Site $site)
    {
        $site->update($request->validated());

        return redirect()
                    ->route('sites.index')
                    ->with('message', 'Site Alterado com sucesso');
    }

    public function destroy(Site $site)
    {
        $site->delete();

        return redirect()
                    ->route('sites.index')
                    ->with('message', 'Site Deletado com sucesso');;
    }
}
