<?php

use Illuminate\Database\Seeder;
use App\Task;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();
        factory(Task::class, 50)->create();

        // $this->call(UsersTableSeeder::class);
    }
}
