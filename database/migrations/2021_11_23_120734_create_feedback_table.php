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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('s_name')->nullable();
            $table->string('name')->nullable();
            $table->string('p_name')->nullable();
            $table->string('email')->nullable();
            $table->foreignIdFor(App\Models\User::class, 'user_id')->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('file_path')->nullable();
            $table->boolean('answered')->default(false);
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
        Schema::dropIfExists('feedback');
    }
};
