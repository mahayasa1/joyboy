<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('satuans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_satuan');
            $table->timestamps();
        });

        // setelah satuans ada, baru tambahkan foreign key ke barangs
        Schema::table('barangs', function (Blueprint $table) {
            $table->foreign('satuan_id')
                ->references('id')
                ->on('satuans')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropForeign(['satuan_id']);
        });

        Schema::dropIfExists('satuans');
    }
};
