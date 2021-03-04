<?php

namespace App\Http\Controllers\Configurator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\ConfigurationValidator;
use App\Models\Configuration;
use App\Models\FinalProduct;
use Auth;
use Illuminate\Contracts\Auth\Authenticatable;
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
     * Store a newly created resource in storage.
     *
     * @param ConfigurationValidator $configuration
     * @param Configuration $config
     * @param FinalProduct $details
     * @param Authenticatable $user
     * @return string
     */
    public function store(
        ConfigurationValidator $configuration,
        Configuration $config,
        FinalProduct $details,
        Authenticatable $user
    ) {
        foreach($configuration->products as $product) {
            $config->create(
                [
                    'product_id' => $product,
                    'category_id' => $configuration->baseCategory,
                    'link_id' => $configuration->link,
                    'company_id' => $user->company_id,
                    'order' => 0,
                    'length' => $configuration->length
                ]
            );
        }

        foreach($configuration->productsToConnect as $product) {
            $details->create([
                'link_id' => $configuration->link,
                'product_id' => str_replace('con-', '', $product),
                'order' => 0,
                'price' => $configuration->price,
                'percent' => $configuration->percentage
                ]);

        }

        return \response(['message'=>'Configuratie is succesvol opgeslagen.'], 200);

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
