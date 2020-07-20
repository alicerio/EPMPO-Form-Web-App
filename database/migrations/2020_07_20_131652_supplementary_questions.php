<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SupplementaryQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->boolean('sqq_1')->nullable();
            $table->text('description_sqq_1')->nullable();
            $table->boolean('sqq_2')->nullable();
            $table->text('description_sqq_2')->nullable();
            $table->boolean('sqq_3')->nullable();
            $table->text('description_sqq_3')->nullable();
            $table->boolean('sqq_4')->nullable();
            $table->text('description_sqq_4')->nullable();
            $table->boolean('sqq_5')->nullable();
            $table->text('description_sqq_5')->nullable();
            $table->boolean('sqq_6')->nullable();
            $table->text('description_sqq_6')->nullable();
            $table->boolean('sqq_7')->nullable();
            $table->text('description_sqq_7')->nullable();
            $table->boolean('sqq_8')->nullable();
            $table->text('description_sqq_8')->nullable();
            $table->boolean('sqq_9')->nullable();
            $table->text('description_sqq_9')->nullable();
            $table->boolean('sqq_10')->nullable();
            $table->text('description_sqq_10')->nullable();
            $table->boolean('sqq_11')->nullable();
            $table->text('description_sqq_11')->nullable();
            $table->boolean('sqq_12')->nullable();
            $table->text('description_sqq_12')->nullable();
            $table->boolean('sqq_13')->nullable();
            $table->text('description_sqq_13')->nullable();
            $table->boolean('sqq_14')->nullable();
            $table->text('description_sqq_14')->nullable();
            $table->boolean('sqq_15')->nullable();
            $table->text('description_sqq_15')->nullable();
            $table->boolean('sqq_16')->nullable();
            $table->text('description_sqq_16')->nullable();
            $table->boolean('sqq_17')->nullable();
            $table->text('description_sqq_17')->nullable();
            $table->boolean('sqq_18')->nullable();
            $table->text('description_sqq_18')->nullable();
            $table->boolean('sqq_19')->nullable();
            $table->text('description_sqq_19')->nullable();
            $table->boolean('sqq_20')->nullable();
            $table->text('description_sqq_20')->nullable();
            $table->boolean('sqq_21')->nullable();
            $table->text('description_sqq_21')->nullable();
            $table->boolean('sqq_22')->nullable();
            $table->text('description_sqq_22')->nullable();
            $table->boolean('sqq_23')->nullable();
            $table->text('description_sqq_23')->nullable();
            $table->boolean('sqq_24')->nullable();
            $table->text('description_sqq_24')->nullable();
            $table->boolean('sqq_25')->nullable();
            $table->text('description_sqq_25')->nullable();
            $table->boolean('sqq_26')->nullable();
            $table->text('description_sqq_26')->nullable();
            $table->boolean('sqq_27')->nullable();
            $table->text('description_sqq_27')->nullable();
            $table->boolean('sqq_28')->nullable();
            $table->text('description_sqq_28')->nullable();
            $table->boolean('sqq_29')->nullable();
            $table->text('description_sqq_29')->nullable();
            $table->boolean('sqq_30')->nullable();
            $table->text('description_sqq_30')->nullable();
            $table->boolean('sqq_31')->nullable();
            $table->text('description_sqq_31')->nullable();
            $table->boolean('sqq_32')->nullable();
            $table->text('description_sqq_32')->nullable();
            $table->boolean('sqq_33')->nullable();
            $table->text('description_sqq_33')->nullable();
            $table->boolean('sqq_34')->nullable();
            $table->text('description_sqq_34')->nullable();
            $table->boolean('sqq_35')->nullable();
            $table->text('description_sqq_35')->nullable();
            $table->text('description_sqq_36')->nullable();

            $table->text('envdoctype')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            Schema::dropIfExists('projects');
        });
    }
}
