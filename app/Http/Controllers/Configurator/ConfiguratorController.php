<?php

namespace App\Http\Controllers\Configurator;

use App\Events\Products\ConfiguredEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Store\ConfigurationValidator;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConfiguratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $company = Auth::user()->company;

        return view('configurator', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * @param ConfigurationValidator $configuration
     * @return string
     */
    public function store(ConfigurationValidator $configuration)
    {
        ConfiguredEvent::dispatch((array)$configuration->all(), \Auth::user()->company_id);

        return \response(['message' => 'Configuratie is succesvol opgeslagen.'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
