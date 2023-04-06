<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Auctions extends Controller
{



    public function activeAuctions()
    {
        $yesterdayDate = Carbon::now('Europe/London')->addDay(-2)->format('Y-m-d');
        $todayDate = Carbon::now('Europe/London')->addDay(-1)->format('Y-m-d');

        $activeAuctions = DB::select("SELECT a.auction,COUNT(auction_products.product_id) AS p_count,auction_products.auction_id, a.created_at FROM auctions AS a INNER JOIN auction_products ON a.id = auction_products.auction_id INNER JOIN products ON auction_products.product_id = products.id  WHERE auction_products.auction_id = a.id AND a.created_at > '$todayDate'  GROUP BY auction_products.auction_id ORDER BY a.created_at DESC");

        // $activeAuctions = DB::table('auctions')->join('auction_products', 'auctions.id', '=', 'auction_products.auction_id')->join('products', 'auction_products.product_id', '=', 'products.id')->where('auction_products.auction_id', '=', 'auctions.id')->select('auction_products.auction_id', 'auctions.created_at', 'auctions.auction', DB::Raw('COUNT(auction_products.product_id) AS p_count'))->groupBy('auction_products.auction_id')->get();

        // ->where('auctions.created_at',[$yesterdayDate,$todayDate]) ->orderBy('auctions.created_at DESC')
        // dd($activeAuctions);
        return view('admins/body/live-auction', compact('activeAuctions'));
    }
    public function expiredAuctions()
    {
        $todayDate = Carbon::now('Europe/London')->addDay(-2)->format('Y-m-d');
        $activeAuctions = DB::select("SELECT a.auction,COUNT(auction_products.product_id) AS p_count,auction_products.auction_id, a.created_at FROM auctions AS a INNER JOIN auction_products ON a.id = auction_products.auction_id INNER JOIN products ON auction_products.product_id = products.id  WHERE auction_products.auction_id = a.id AND a.created_at < '$todayDate' GROUP BY auction_products.auction_id ORDER BY a.created_at DESC");
        return view('admins/body/expired-auction', compact('activeAuctions'));
    }
    public function upcomingAuctions()
    {
        $upcomingDate = Carbon::now('Europe/London')->format('Y-m-d');
        // dd($upcomingDate);
        $activeAuctions = DB::select("SELECT a.auction,COUNT(auction_products.product_id) AS p_count,auction_products.auction_id, a.created_at FROM auctions AS a INNER JOIN auction_products ON a.id = auction_products.auction_id INNER JOIN products ON auction_products.product_id = products.id  WHERE auction_products.auction_id = a.id AND a.created_at = '$upcomingDate' GROUP BY auction_products.auction_id ORDER BY a.created_at DESC");

        return view('admins/body/upcomming-auction', compact('activeAuctions'));
    }
}
