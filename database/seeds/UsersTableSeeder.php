<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        'name' => 'samer',
        'password' => '$2y$10$.GsVm42RmVRHwF6xmLloW./oW9YV6uUaHFaY1uWKtAoPbpKm67FGO',
        'firstName' => 'Samer',
        'lastName' => 'Tahan',
        'DOB' => '2021-08-18',
        'email' => 'rami222@admin.com',
      ]);

        $user = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
                'name' => $user->name,
                'password' => bcrypt('secret'),
              'firstName' => $user->name,
              'lastName' => $user->lastName,
              'DOB' => $user->date($format = 'Y-m-d', $max = 'now'),
              'email' => $user->email,
              'role_id' => 4,
              'account_status_id' => rand(1, 2),
              'created_at' => $user->date($format = 'Y-m-d', $min = 'now'),
            ]);
        }

        $workspace = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('workspaces')->insert([
                  'name' => $workspace->name,
                  'created_at' => $workspace->date($format = 'Y-m-d', $min = 'now'),
                  'updated_at' => $workspace->date($format = 'Y-m-d', $min = 'now'),
              ]);
        }

        $project = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('projects')->insert([
                  'name' => $project->name,
                  'description'=> $project->name,
                  'start_date' => $project->date($format = 'Y-m-d', $min = 'now'),
                  'end_date' => $project->date($format = 'Y-m-d', $min = 'now'),
                  'deadline'=> $project->date($format = 'Y-m-d', $min = 'now'),
                  'estimite_time'=> rand(1,100),
                  'project_status_id' => rand(1,4),
                  'workspace_id' => rand(1,10),
                  'created_at' => $workspace->date($format = 'Y-m-d', $min = 'now'),
                  'updated_at' => $workspace->date($format = 'Y-m-d', $min = 'now'),
              ]);
        }

        $Workspace_user = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('user_workspace')->insert([
                  'user_id'    => rand(1,10),
                  'workspace_id'    => rand(1,10),
                  'created_at' => $workspace->date($format = 'Y-m-d', $min = 'now'),
                  'updated_at' => $workspace->date($format = 'Y-m-d', $min = 'now'),
              ]);
        }
    }
}
