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
      //   DB::table('users')->insert([
      //   'name' => 'samer',
      //   'password' => '$2y$10$.GsVm42RmVRHwF6xmLloW./oW9YV6uUaHFaY1uWKtAoPbpKm67FGO',
      //   'firstName' => 'Samer',
      //   'lastName' => 'Tahan',
      //   'DOB' => '2021-08-18',
      //   'email' => 'rami222@admin.com',
      // ]);

        $user = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
                'name' => "user".$index,
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
        foreach (range(1, 3) as $index) {
            DB::table('workspaces')->insert([
                  'name' => "workspace".$index,
                  'created_at' => $workspace->date($format = 'Y-m-d', $min = 'now'),
                  'updated_at' => $workspace->date($format = 'Y-m-d', $min = 'now'),
              ]);
        }

        $project = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('projects')->insert([
                  'name' => "project".$index,
                  'description'=> $project->name,
                  'start_date' => $project->date($format = 'Y-m-d', $min = 'now'),
                  'end_date' => $project->date($format = 'Y-m-d', $min = 'now'),
                  'deadline'=> $project->date($format = 'Y-m-d', $min = 'now'),
                  'estimite_time'=> rand(1,100),
                  'project_status_id' => rand(1,4),
                  'workspace_id' => rand(1,5),
                  'created_at' => $workspace->date($format = 'Y-m-d', $min = 'now'),
                  'updated_at' => $workspace->date($format = 'Y-m-d', $min = 'now'),
              ]);
        }


        $task = Faker::create();
        foreach (range(1, 20) as $index) {
            DB::table('tasks')->insert([
                  'name' => "task".$index,
                  'description'=> $task->name,
                  'start_date' => $task->date($format = 'Y-m-d', $min = 'now'),
                  'end_date' => $task->date($format = 'Y-m-d', $min = 'now'),
                  'deadline'=> $task->date($format = 'Y-m-d', $min = 'now'),
                  'estimite_time'=> rand(1,100),
                  'task_status_id' => rand(1,4),
                  'project_id' => rand(1,10),
                  'created_at' => $workspace->date($format = 'Y-m-d', $min = 'now'),
                  'updated_at' => $workspace->date($format = 'Y-m-d', $min = 'now'),
              ]);
        }


        $subtask = Faker::create();
        foreach (range(1, 20) as $index) {
            DB::table('sub_tasks')->insert([
                  'name' => "subtask".$index,
                  'description'=> $subtask->name,
                  'start_date' => $subtask->date($format = 'Y-m-d', $min = 'now'),
                  'end_date' => $subtask->date($format = 'Y-m-d', $min = 'now'),
                  'deadline'=> $subtask->date($format = 'Y-m-d', $min = 'now'),
                  'estimite_time'=> rand(1,100),
                  'task_status_id' => rand(1,4),
                  'task_id' => rand(1,20),
                  'user_id' => rand(1,10),
                  'created_at' => $subtask->date($format = 'Y-m-d', $min = 'now'),
                  'updated_at' => $subtask->date($format = 'Y-m-d', $min = 'now'),
              ]);
        }

        // $Workspace_user = Faker::create();
        // foreach (range(1, 10) as $index) {
        //     DB::table('user_workspace')->insert([
        //           'user_id'    => rand(1,10),
        //           'workspace_id'    => rand(1,3),
        //           'created_at' => $workspace->date($format = 'Y-m-d', $min = 'now'),
        //           'updated_at' => $workspace->date($format = 'Y-m-d', $min = 'now'),
        //       ]);
        // }

        // $fakerUser = Faker::create();
        // $W_users = Workspace::with('users')->pluck('id')->toArray();

        // $fakerWorkspace = Faker::create();
        // $workspaces = Workspace::all()->pluck('id')->toArray();

        // $fakerProject = Faker::create();
        // $projects = Project::all()->pluck('id')->toArray();

        // $fakerTask = Faker::create();
        // $tasks = Task::all()->pluck('id')->toArray();

        // $fakerSub = Faker::create();
        // $subTasks = SubTask::all()->pluck('id')->toArray();
        

        // $Workspace_user = Faker::create();
        // foreach (range(1, 50) as $index) {
        //     DB::table('user_workspace')->insert([
        //           'user_id'    => rand(1,50),
        //           'workspace_id'    => rand(1,10),
        //           'created_at' => $workspace->date($format = 'Y-m-d', $min = 'now'),
        //           'updated_at' => $workspace->date($format = 'Y-m-d', $min = 'now'),
        //       ]);
        // }

        // $Project_user = Faker::create();
        // foreach (range(1, 10) as $index) {
        //     DB::table('Task_user')->insert([
        //           'user_id'    => rand(1,10),
        //           'task_id'    => rand(1,10),
        //           'created_at' => $Project_user->date($format = 'Y-m-d', $min = 'now'),
        //           'updated_at' => $Project_user->date($format = 'Y-m-d', $min = 'now'),
        //       ]);
        // }

        // $Task_user = Faker::create();
        // foreach (range(1, 10) as $index) {
        //     DB::table('Task_user')->insert([
        //           'user_id'    => rand(1,10),
        //           'task_id'    => rand(1,10),
        //           'created_at' => $Task_user->date($format = 'Y-m-d', $min = 'now'),
        //           'updated_at' => $Task_user->date($format = 'Y-m-d', $min = 'now'),
        //       ]);
        // }

        


        
    }
}
