<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Bid;
use App\Models\Winner;
use App\Models\Product;
use App\Models\Auction_product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Auction as ModelsAuction;

class auction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:auction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Auctions Live';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle()
    {
        /// today products status update to live
        $today = Carbon::now('Europe/London')->format('Y-m-d');
        $product =  Product::where('start_at', $today)->update(['status' => '3']);

        $expiredDate = Carbon::now('Europe/London')->addDays(-2)->format('Y-m-d');
        /// last 2 day status update to null 
        // php_value date.timezone 'Europe/London'
        $now = Carbon::now('Europe/London')->format('Y-m-d H:i:s');
        $productExpired =  Product::all()->where('start_at', $expiredDate);
        foreach ($productExpired as $productE) {
            $Plivecount = $productE->live_count;
            $livecount = $Plivecount + 1;
            $Exproduct = Product::find($productE->id);
            $Exproduct->status = null;
            $Exproduct->live_count = $livecount;
            $Exproduct->update();
        }
        $expiredDay = Carbon::now('Europe/London')->addDays(-2)->format('Y-m-d');
        $ExpiredBids = DB::select("SELECT b.user_id,b.product_id, b.amount FROM bids AS b INNER JOIN products ON b.product_id = products.id WHERE b.id IN ( SELECT MAX(lb.id) FROM bids AS lb INNER JOIN products ON lb.product_id = products.id WHERE products.start_at = '$expiredDay' AND lb.user_id IS NOT NULL GROUP BY lb.product_id )  ");
        foreach ($ExpiredBids as $ExpiredBid) {
            if (!empty($ExpiredBid)) {
                $bid_Data[] = [
                    'user_id' => $ExpiredBid->user_id,
                    'product_id' => $ExpiredBid->product_id,
                    'bid_amount' => $ExpiredBid->amount,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
                Winner::insert($bid_Data);
            }
        }
        $upcoming = Carbon::now('Europe/London')->addDays(1)->format('Y-m-d');
        $upcomingAuction = Carbon::now('Europe/London')->addDays(1)->format('Ymd');
        $upcominProducts =  Product::where('start_at', $upcoming)->get();
        if ($upcominProducts) {
            $findAuction = DB::table('auctions')->where('auction', $upcomingAuction)->first();
            $auctionID = '';
            if (empty($findAuction)) {
                $auction = new ModelsAuction;
                $auction->auction = $upcomingAuction;
                $auction->save();
                $auctionID = $auction->id;
            }
            if ($auctionID != '') {
                $data = array();
                foreach ($upcominProducts as $product) {
                    if (!empty($product)) {
                        $data[] = [
                            'auction_id' => $auctionID,
                            'product_id' => $product->id,
                            'created_at' => $now,
                            'updated_at' => $now,
                        ];
                    }
                }
                Auction_product::insert($data);
            }
        }
    }
}
