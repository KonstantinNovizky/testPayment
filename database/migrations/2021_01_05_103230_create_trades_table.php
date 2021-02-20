<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            // $table->text('tracker');
            // $table->integer("qty");
            // $table->text("symbol");
            // $table->text("expiration_date");
            // $table->text("call_put");
            // $table->float("strike_price");
            // $table->float("price");
            // $table->float("stoploss");
            // $table->float("resistance");
            // $table->float("stock_stoploss");
            // $table->float("stock_resistance");
            // $table->float("buy_price");
            // $table->float("sell_price");
            // $table->text("sell_date");
            // $table->float("total_net");
            // $table->float("cumulative");
            // $table->float("total_volume");
            // $table->integer("open_interest");
            // $table->integer("days_to_expire");
            // $table->float("high_price");
            // $table->float("low_price");
            // $table->float("open_price");
            // $table->float("close_price");
            // $table->text("datetime");
            $table->text('s_no');
            $table->timestamp("buy_date");
            $table->integer("qty");
            $table->text("symbol");
            $table->timestamp("expiration_date")->useCurrent();
            $table->text("callput");
            $table->float("strike_price");
            $table->float("stock_price");
            $table->float("stock_stoploss");
            $table->float("stock_resistance");

            $table->float("buy_price");
            $table->float("sell_price");
            $table->text("sell_date");
            $table->float("net");

            $table->integer("profit");
            $table->integer("current_price");
            $table->integer("days_to_expire");
            $table->string("status")->default("hold");

            // $table->float("total_volume");
            // $table->integer("open_interest");
            // $table->float("high_price");
            // $table->float("low_price");
            // $table->float("open_price");
            // $table->float("close_price");
            // $table->text("datetime");


            
            // $table->timestamp('expire_date');
            // $table->string("stock_name");
            // $table->string("strike");
            // $table->string("call");
            // $table->integer("qty");
            // $table->float("price");
            // $table->integer("total");
            // $table->timestamp("sell_date");
            // $table->float("sell_price");
            // $table->integer("high");
            // $table->integer("total_net");
            // $table->integer("profit");
            // $table->string("hold")->default("");
            // $table->integer("total_profit");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trades');
    }
}