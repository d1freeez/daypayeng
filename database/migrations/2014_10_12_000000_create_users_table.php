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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('s_name');
            $table->string('name');
            $table->string('p_name')->nullable();
            $table->string('email');
            $table->string('iin')->nullable();
            $table->string('id_number')->nullable();
            $table->string('e_number')->nullable();
            $table->string('photo')->nullable();
            $table->integer('m_amount')->nullable();
            $table->float('d_amount')->nullable();
            $table->integer('company_id')->nullable();
            $table->string('type')->nullable();
            $table->string('position')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('without_checking')->default(false);
            $table->string('password');
            $table->float('balance')->default(0);
            $table->boolean('verified')->default(false);
            $table->string('email_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
