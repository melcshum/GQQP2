<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;
use App\Models\Main\Item;
use App\User;
use Auth;
use Hash;
use Illuminate\Support\Facades\Redirect;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->item = Item::all();
    }

    public function index()
    {
        $items = DB::table('items')->get();
        return view('main.shop.index', compact('items'));

    }

    public function exchangeItem(Request $request){
        $itemid = $request->input('itemId');
        $userId = Auth::user() -> id;
        $gold = Auth::user() -> gold;
        $price = DB::table('items')->where('item_id', $itemid)->first();
        $change = Auth::user() -> change;
        $half = Auth::user() -> half;
        $extra = Auth::user() -> extra;

        if($itemid == 1){
            if($gold >= 500){
                $change += 1;
                $gold -= 500;
                DB::table('users')->where('id', $userId)->update(['gold' => $gold]);
                DB::table('users')->where('id', $userId)->update(['change' => $change]);
                return redirect::to('shop');
            }
            else{
                return redirect::to('shop')->with('message', 'Not Enough Gold');
            }
        }

        elseif($itemid == 2){
            if($gold >= 1000){
                $half += 1;
                $gold -= 500;
                DB::table('users')->where('id', $userId)->update(['gold' => $gold]);
                DB::table('users')->where('id', $userId)->update(['half' => $half]);
                return redirect::to('shop');
            }
            else{
                return redirect::to('shop')->with('message', 'Not Enough Gold');
            }
        }

        elseif ($itemid == 3) {
            if ($gold >= 2000) {
                $extra += 1;
                $gold -= 2000;
                DB::table('users')->where('id', $userId)->update(['gold' => $gold]);
                DB::table('users')->where('id', $userId)->update(['extra' => $extra]);
                return redirect::to('shop');
            } else {
                return redirect::to('shop')->with('message', 'Not Enough Gold');
            }
        }
    }
}
