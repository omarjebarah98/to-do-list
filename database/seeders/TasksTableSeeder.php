<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('role', 'admin')->first();
        $users = User::where('role', 'user')->get();

        Task::create([
            'name' => 'Admin Task 1',
            'user_id' => $admin->id,
        ]);

        Task::create([
            'name' => 'Admin Task 2',
            'user_id' => $admin->id,
        ]);

        foreach ($users as $user) {
            Task::create([
                'name' => $user->name . ' Task 1',
                'user_id' => $user->id,
            ]);

            Task::create([
                'name' => $user->name . ' Task 2',
                'user_id' => $user->id,
            ]);
        }
    }
}
