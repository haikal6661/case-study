<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::updateOrCreate([
            'id' => 1 ,
            'department' => 'Admin Department'
        ]);

        Department::updateOrCreate([
            'id' => 2 ,
            'department' => 'Technical Department'
        ]);

        Department::updateOrCreate([
            'id' => 3 ,
            'department' => 'PMO Department'
        ]);

        Department::updateOrCreate([
            'id' => 4 ,
            'department' => 'Sale Department'
        ]);

        Department::updateOrCreate([
            'id' => 5 ,
            'department' => 'IT Department'
        ]);
    }
}
