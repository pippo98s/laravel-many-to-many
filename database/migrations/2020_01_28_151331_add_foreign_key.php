<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_task', function (Blueprint $table) {
            $table -> bigInteger('employee_id') -> unsigned() -> index();
            $table -> foreign('employee_id' , 'employee') -> references('id') -> on('employees');
            
            $table -> bigInteger('task_id') -> unsigned() -> index();
            $table -> foreign('task_id' , 'task') -> references('id') -> on('tasks'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee_task', function (Blueprint $table) {
            $table -> dropForeign('employee');
            $table -> dropForeign('task');

            $table -> dropColumn('employee_id');
            $table -> dropColumn('task_id');
        });
    }
}
