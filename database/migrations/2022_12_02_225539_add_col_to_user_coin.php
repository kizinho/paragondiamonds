<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColToUserCoin extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('user_coins', function (Blueprint $table) {
            $table->longText('bank_name')->after('address')->nullable();
            $table->longText('account_name')->after('address')->nullable();
            $table->longText('account_number')->after('address')->nullable();
            $table->longText('wire_routing_number')->after('address')->nullable();
            $table->longText('ach_routing_number')->after('address')->nullable();
            $table->longText('swift_code')->after('address')->nullable();
            $table->longText('bank_address')->after('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('user_coins', function (Blueprint $table) {
            $table->dropColumn('bank_name');
            $table->dropColumn('account_name');
            $table->dropColumn('account_number');
            $table->dropColumn('wire_routing_number');
            $table->dropColumn('ach_routing_number');
            $table->dropColumn('swift_code');
            $table->dropColumn('bank_address');
        });
    }

}
