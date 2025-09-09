<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * // @TODO: move value field in another table in order to increase sum calculation execution times
     */
    public function up(): void
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('recordId')->index();
            $table->dateTime('time')->nullable();
            $table->string('sourceId');
            $table->string('destinationId')->index();
            $table->enum('type', ['positive', 'negative'])->nullable(); // this can also be stored as bool
            $table->decimal('value', 10, 4);
            $table->string('unit');
            $table->string('reference');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
