<?php

namespace App\Console;

use Carbon\Carbon;
use App\Models\Bid;
use App\Models\Auction;
use App\Models\Product;
use App\Models\Auction_product;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('auth:clear-resets')->everyFifteenMinutes();
        $schedule->command('run:auction')->everyFiveMinutes()->timezone('Europe/London');
        // $schedule->call(function () {
        //     /// today products status update to live
        //     $today = Carbon::now('Europe/London')->format('Y-m-d');
        //     $product =  Product::where('start_at', $today)->update(['status' => '3']);

        //     $expiredDate = Carbon::now('Europe/London')->addDays(-2)->format('Y-m-d');
        //     /// last 2 day status update to null 
        //     // php_value date.timezone 'Europe/London'

        //     $productExpired =  Product::all()->where('start_at', $expiredDate);
        //     foreach ($productExpired as $productE) {
        //         $Plivecount = $productE->live_count;
        //         $livecount = $Plivecount + 1;
        //         $Exproduct = Product::find($productE->id);
        //         $Exproduct->status = null;
        //         $Exproduct->live_count = $livecount;
        //         $Exproduct->update();
        //     }


        //     $upcoming = Carbon::now('Europe/London')->addDays(1)->format('Y-m-d');
        //     $now = Carbon::now('Europe/London')->format('Y-m-d H:i:s');
        //     $upcomingAuction = Carbon::now('Europe/London')->addDays(1)->format('Ymd');
        //     $upcominProducts =  Product::where('start_at', $upcoming)->get();
        //     if ($upcominProducts) {
        //         $auction = new Auction();
        //         $auction->auction = $upcomingAuction;
        //         $auction->save();
        //         $auctionID = $auction->id;
        //         foreach ($upcominProducts as $product) {
        //             if (!empty($product)) {
        //                 $data[] = [
        //                     'auction_id' => $auctionID,
        //                     'product_id' => $product->id,
        //                     'created_at' => $now,
        //                     'updated_at' => $now,
        //                 ];
        //             }
        //         }
        //         Auction_product::insert($data);
        //     }
        // })->daily()->timezone('Europe/London');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
