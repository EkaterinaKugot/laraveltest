<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AddRolesToRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $now = Carbon::now();

        // Добавление ролей в таблицу roles
        DB::table('roles')->insert([
            ['name' => 'Художник', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Писатель', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Искусствовед', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Дизайнер', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Музыкант', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Режиссер', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Актер', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Фотограф', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('roles')->whereIn('name', [
            'Художник',
            'Писатель',
            'Искусствовед',
            'Дизайнер',
            'Музыкант',
            'Режиссер',
            'Актер',
            'Фотограф'
        ])->delete();
    }
}
