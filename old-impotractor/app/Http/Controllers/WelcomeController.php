<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller {
    public function index() {
      $products = [
        "Filtros" => [
          "slug" => "filters",
          "items" => [
            // Fix TYPOS here pls...
            "Filtros de Aire" => "/images/filtros/FAire.jpg",
            "Filtros de Diesel" => "/images/filtros/FDiesel.jpg",
            "Filtros de Aceite" => "/images/filtros/FAceite.jpg",
            "Filtros Hidraulicos" => "/images/filtros/FHidr.jpg",
            "Filtros de Transmision" => "/images/filtros/FTrans.jpg"
          ]
        ],
        "Sellos, empaques y fajas" => [
          "slug" => "seyf",
          "items" => [
            "Kit Empaques" => "/images/seyf/KitEmpaques.png",
            "Kit Sellos" => "/images/seyf/KitSellos.png",
            "Kit Fajas" => "/images/seyf/KitFajas.jpg"
          ]
        ],
        "Herramienta de Corte" => [
          "slug" => "hercorte",
          "items" => [
            // Fix TYPOS here pls...
            "Bases para Cucharon" => "/images/hercorte/BaseCuch.jpg",
            "Bases para puntas de patrol" => "/images/hercorte/BasePatrol.jpg",
            "Cuchillas para Cucharon" => "/images/hercorte/CuchCuch.jpg",
            "Protectores para Cucharon" => "/images/hercorte/ProtCuch.jpg",
            "Puntas para Cucharon" => "/images/hercorte/PunCuch.jpg",
            "Pines y Seguros" => "/images/hercorte/PinySeg.jpg",
          ]
        ],
        "Rodaje" => [
          "slug" => "rodaje",
          "items" => [
            "Rodaje" => "/images/rodaje/rodajes.jpg",
          ]
        ],
        "Indicadores" => [
          "slug" => "indicadores",
          "items" => [
            "Indicadores de Temperatura de Aceite" => "/images/indicadores/IndAceite.jpg",
            "Indicadores de Temperatura de Agua" => "/images/indicadores/IndAgua.jpg",
          ]
        ],
        "Eléctricos" => [
          "slug" => "electricos",
          "items" => [
            "Switch de Paso" => "/images/electricos/SwitchPaso.jpg",
            "Switch de Starter" => "/images/electricos/SwitchStarter.jpg",
            "Horometro Digital" => "/images/electricos/HorDigital.jpg",
          ]
        ],
        "Motores" => [
          "slug" => "motores",
          "items" => [
            "Gasket Kits" => "/images/motores/GasketKits.jpg",
            "Bombas Hidráulicas" => "/images/motores/BombasHidr.jpg",
            "Liner Kits" => "/images/motores/LinerKits.jpg",
            "Bombas de Frenos" => "/images/motores/BombasFrenos.jpg",
            "Válvulas de Motor" => "/images/motores/ValvMotor.jpg",
            "Bombas de Agua" => "/images/motores/BombasAgua.jpg",
          ]
        ],
      ];
      return view('welcome')->with(['products' => $products]);
    }
}
