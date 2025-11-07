<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // pembeli
        $table->foreignId('product_id')->constrained('internet_packages')->onDelete('cascade'); // aplikasi premium
        $table->string('kontak'); // nomor WA / email
        $table->enum('status', ['pending', 'paid', 'failed'])->default('pending');
        $table->string('metode_pembayaran');
        $table->timestamp('tanggal_pembelian');
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
        Schema::dropIfExists('pembelian');
    }
}
