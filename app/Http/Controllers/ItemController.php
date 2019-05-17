<?php
namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        date_default_timezone_set('Asia/Manila');
    }

    public function index(){
        return view('pages.items.items');
    }

    public function list(){
        $items = Item::with('categories', 'models', 'brand')
                ->orderBy('id', 'DESC')
                ->get();
        return response()->json($items);
    }

    public function create(Request $request){
        $item = Item::orderBy('created_at', 'DESC')->first();
        if($item) {
        $itemNo = $item->itemNo + 1;
        } else {
            $itemNo = 1;
        }
        
        $request->request->add(['dateBought' => Carbon::now()]);
        $request->request->add(['itemNo' => $itemNo]);
        return Item::create($request->except(['token']));
    }
}
