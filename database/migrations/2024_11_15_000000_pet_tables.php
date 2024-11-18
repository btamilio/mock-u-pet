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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();

            // could be an enum, but seems overkill for 2 values
            $table->char('type', 1)->nullable();

            // Laravel has shorthand foreignId methods, but I like to be explicit...
            $table->foreign('owner_id')->references('id')->on('users')->nullable();
            $table->foreign('breed_id')->references('id')->on('pet_breeds')->nullable();

            $table->datestamp('birthday')->nullable();
            $table->bool("is_birthday_approximate")->nullable();
            $table->bool("is_birthday_unknown")->nullable();

            $table->char('gender', 1)->nullable();
            $table->boolean('is_neutered')->nullable();

            $table->timestamps();

            $table->index('owner_id');
            $table->index('type');
            $table->index('breed_id');


        });

        Schema::create('pet_breeds', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->char('type', 1)->nullable();
            $table->bool("is_dangerous")->nullable()->default(0);
            $table->timestamps();

            $table->index('type');
            $table->unique(['type', 'name']);

        });

 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
        Schema::dropIfExists('pet_types');

    }
};
