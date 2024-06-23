<?php


namespace App\Http\Controllers;


use App\Service\Product\ProductService;

class BaseController extends Controller
{
    public $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }
}
