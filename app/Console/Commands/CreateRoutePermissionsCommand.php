<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;


class CreateRoutePermissionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:createPermissionRoutes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tạo permission từ routes';

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
        $this->line('Bắt đầu lấy Route');
        $routers = Route::getRoutes()->getRoutes();
        foreach ($routers as $route) {
            if ($route->getName() != '' && $route->getAction()['middleware']['0'] == 'web') {
                $permission = Permission::where('name', $route->getName())->first();
                if (is_null($permission)) {
                    Permission::create(['name' => $route->getName()]);
                }
            }
            $this->info('Permission routes added successfully.');
        }
        Permission::create(['name'=>'all']);
        $this->line('Lưu Route thành công');
    }
}
