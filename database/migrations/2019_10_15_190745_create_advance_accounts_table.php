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
        Schema::create('advance_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(App\Models\User::class);
            $table->foreignIdFor(App\Models\LibCompany::class, 'company_id');
            $table->bigInteger('amount');
            $table->string('status')->nullable();
            $table->boolean('is_company_accepted')->default(0);
            $table->dateTime('payed_at')->nullable();
            $table->boolean('is_payed')->default(false);
            $table->foreignIdFor(App\Models\User::class, 'from_user_id')->nullable();
            $table->boolean('is_commission_paid')->default(false);
            $table->float('fee')->nullable();
            $table->text('reason_rejection')->nullable();
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
        Schema::dropIfExists('advance_accounts');
    }
};
