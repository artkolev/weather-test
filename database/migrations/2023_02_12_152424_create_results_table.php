<?php

use App\Domain\Contracts\ResultContract;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(ResultContract::TABLE, function (Blueprint $table) {
            $table->uuid();
            $table->string(ResultContract::PROVIDER);
            $table->float(ResultContract::TEMPERATURE);
            $table->float(ResultContract::WIND_SPEED);
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
        Schema::dropIfExists('results');
    }
};
