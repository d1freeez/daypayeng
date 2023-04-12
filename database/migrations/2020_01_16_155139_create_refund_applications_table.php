<?php

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
        Schema::create('refund_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(App\Models\AdvanceAccount::class, 'advance_id');
            $table->foreignIdFor(App\Models\User::class);
            $table->string('phone');
            $table->text('content');
            $table->boolean('is_refunded')->default(false);
            $table->boolean('is_finished')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refund_applications');
    }
};
