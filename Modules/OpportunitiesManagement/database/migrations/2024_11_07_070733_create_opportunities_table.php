<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\OpportunitiesManagement\Enums\OpportunityStatus;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->integer('customer');
            $table->unsignedInteger('estimated_price');
            $table->unsignedBigInteger('user_id')->index();
            $table->enum('status', array_column(OpportunityStatus::cases(), 'value'))
                ->default(OpportunityStatus::PENDING);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opportunities');
    }
};
