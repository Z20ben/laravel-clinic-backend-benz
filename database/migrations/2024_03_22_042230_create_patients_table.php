<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            //nik
            $table->string('nik');
            $table->string('kk');
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('gender');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->boolean('is_deceased')->default(false);
            $table->string('address_line');
            $table->string('city');
            $table->string('city_code');
            $table->string('province');
            $table->string('province_code');
            //district
            $table->string('district');
            //district code
            $table->string('district_code');
            //village
            $table->string('village');
            //village code
            $table->string('village_code');
            //rt
            $table->string('rt');
            //rw
            $table->string('rw');
            //postal_code
            $table->string('postal_code');
            //marital_status
            $table->string('marital_status');
            //relationship name
            $table->string('relationship_name')->nullable();
            //relationship phone
            $table->string('relationship_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
