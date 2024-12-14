<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Restaurant;
use Inertia\Inertia;
use Inertia\Response;

class RestaurantController extends Controller
{
    public function index(): Response
    {
        $this->authorize("restaurant.viewAny");


        return Inertia::render('Admin/Restaurants/Index', [
            "restaurants" => Restaurant::with(["city", 'owner'])->get(),
        ]);
    }

    // public function halo(): Response
    // {
    //     $this->
    // }

    public function create(): Response
    {
        $this->authorize("restaurant.create");

        return Inertia::render("Admin/Restaurants/Create", [
            "cities" => City::get(["id", "name"]),
        ]);
    }
}
