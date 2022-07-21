<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class CreateRolesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:createRoles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command create roles';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line('Bắt đầu tạo quyền');
        $roles =['Admin','Edit','User'];
        foreach ($roles as $role) {
            Role::create(['name'=>$role]);
        }
            return 0;
        $this->line('Tạo quyền thành công');
    }
}
