<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repository\EtudiantPromotionRepositoryInterface;
use Illuminate\Http\Request;

class PromotionController extends Controller
{

    protected $promotion;
    public function __construct(EtudiantPromotionRepositoryInterface $promotion)
    {
        $this->promotion = $promotion;
    }

    public function index()
    {
        return $this->promotion->index();
    }


    public function create()
    {
        return $this->promotion->create();
    }


    public function store(Request $request)
    {
        return $this->promotion->store($request);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Request $request)
    {
        return $this->promotion->destroy($request);

    }
}
