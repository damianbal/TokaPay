<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $t = bin2hex(
            openssl_random_pseudo_bytes(16));

        Schema::create('users', function (Blueprint $table) use ($t) {
            $table->increments('id');
            $table->string('name')->default('Account');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('business')->default(false);
            $table->double('balance')->default(0.0);
            $table->string('access_key')->default($t);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
