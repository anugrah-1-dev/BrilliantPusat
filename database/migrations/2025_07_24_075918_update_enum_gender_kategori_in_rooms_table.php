<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        // Ubah enum gender
        DB::statement("ALTER TABLE rooms MODIFY gender ENUM('PUTRA', 'PUTRI')");

        // Ubah enum kategori
        DB::statement("ALTER TABLE rooms MODIFY kategori ENUM('VVIP', 'VIP', 'BARACK')");
    }

    public function down()
    {
        // Kembalikan enum seperti sebelumnya
        DB::statement("ALTER TABLE rooms MODIFY gender ENUM('putra', 'putri')");
        DB::statement("ALTER TABLE rooms MODIFY kategori ENUM('VVIP', 'VIP', 'Barack')");
    }
};
