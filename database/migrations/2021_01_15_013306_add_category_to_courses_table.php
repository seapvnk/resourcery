<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryToCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->enum('category', [
                'Desenvolvimento e TI',
                'Artes e design',
                'Negócios e finanças',
                'Ensino e estudo acadêmico',
                'Desenvolvimento pessoal',
                'Estilo de vida',
                'Idiomas',
                'Saúde e fitness',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
}
