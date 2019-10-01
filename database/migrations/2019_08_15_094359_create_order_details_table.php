<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->string("oid");
            $table->string("itemCode");
            $table->primary(["oid", "itemCode"]);
            $table->integer("qty");
            $table->decimal("unitPrice");
            $table->foreign("oid")->references('oid')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign("itemCode")->references('code')->on('items')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
