<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->nullable()->after('title');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('set null');
            $table->dropColumn('author'); // Hapus kolom lama
        });
    }
    
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('author')->after('title');
            $table->dropForeign(['author_id']);
            $table->dropColumn('author_id');
        });
    }
    
};
