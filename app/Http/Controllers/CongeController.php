<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CongeController extends Controller
{

    public function index()
    {
        $Conges = Conge::all();
        return $this->successResponse($Conges);
    }

    public function show($id)
    {
        $Conge = Conge::findOrFail($id);
        return $this->successResponse($Conge);
    }

    public function store(Request $request)
    {
        $rules = [
            'typeConge' => 'required',
            'dateDebut' => 'required',
            'dateFin' => 'required|date_format:Y-m-d',
            'periode' => 'required|date_format:Y-m-d',
            'employe_id' => 'required|integer',
            'contrat_id' => 'required|integer',
        ];

        $this->validate($request, $rules);
        $conge = Conge::create($request->all());
        return $this->successResponse($conge);

    }

    public function update(Request $request, $id)
    {
        $rules = [
            'typeConge' => 'required',
            'dateDebut' => 'required',
            'dateFin' => 'required|date_format:Y-m-d',
            'periode' => 'required|date_format:Y-m-d',
            'employe_id' => 'required|integer',
            'contrat_id' => 'required|integer',
        ];

        $this->validate($request, $rules);
        $Conge = Conge::findOrFail($id);
        $Conge = $Conge->fill($request->all());

        if ($Conge->isClean()) {
            return $this->errorResponse('Vous devez changer au moins une valeur',
                Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $Conge->save();
        return $this->successResponse($Conge);
    }


    public function destroy($id)
    {

        $Conge = Conge::findOrFail($id);
        $Conge->delete();
        return $this->successResponse($Conge);
    }


}