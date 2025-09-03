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
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('recipient_type');
            $table->string('design_preference');
            $table->string('color_preference');
            $table->string('greeting_type');
            $table->string('recipient_name')->nullable();
            $table->integer('recipient_age')->nullable();
            $table->string('recipient_flower')->nullable();
            $table->string('recipient_hobby')->nullable();
            $table->string('social_media_link')->nullable();
            $table->date('delivery_date');
            $table->string('delivery_address');
            $table->time('delivery_time');
            $table->string('recipient_contact_name');
            $table->string('recipient_contact_phone');
            $table->string('customer_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaires');
    }
};
