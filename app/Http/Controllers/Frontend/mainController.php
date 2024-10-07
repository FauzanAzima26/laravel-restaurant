<?php

namespace App\Http\Controllers\Frontend;

use App\Models\menu;
use Illuminate\Http\Request;
use App\Http\services\chefService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use function Pest\Laravel\get;

class mainController extends Controller
{

    public function getMenu($id)
    {
        $menu = menu::with('categories:id,title')
            ->where('status', 'active')
            ->where('categories_id', $id)
            ->limit(6)
            ->get();

        return $menu;
    }



    public function __invoke(Request $request)
    {
        $chefs = DB::table('chefs')->orderBy('id', 'desc')->limit(6)->get([
            'name',
            'position',
            'description',
            'image',
            'insta_link',
            'linked_link'
        ]);
        $events = DB::table('events')
        ->orderBy('id', 'desc')
        ->where('status', 'available')
        ->get([
            'image',
            'name',
            'price',
            'description',
            'status',
        ]);
        $gallery = DB::table('images')
        ->orderBy('id', 'desc')
        ->get();

        return view('frontend.index', [
            'chefs' => $chefs,
            'menuStarters' => $this->getMenu(1),
            'menuBreakfast' => $this->getMenu(2),
            'menuLunch' => $this->getMenu(3),
            'menuDinner' => $this->getMenu(4),
            'events' => $events,
            'galleries' => $gallery
        ]);
    }
}
