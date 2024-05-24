<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Artisan;
use Illuminate\Support\Facades\File;

class ClearDatabaseController extends Controller
{
    public function index()
    {
        return view('admin.clear-database.index');
    }

    public function run(){
        //wipe database
        Artisan::call('migrate:refresh');

        //clean uploads directory
        $this->cleanDirectory();

        //seed default table and data
        Artisan::call('db:seed', ['--class' => 'UserSeeder']);
        Artisan::call('db:seed', ['--class' => 'SettingSeeder']);
        Artisan::call('db:seed', ['--class' => 'PaymentSettingSeeder']);
        Artisan::call('db:seed', ['--class' => 'MenuBuilderSeeder']);
        Artisan::call('db:seed', ['--class' => 'RolePermissionSeeder']);

        $user = User::where('name' , 'Rafig Khiyavi')->first();
        $user->assignRole('Super Admin');

        toastr()->success('Database refresh');
        return redirect()->back();
    }

    public function cleanDirectory(){
        $path = public_path('uploads');
        File::cleanDirectory($path);
    }
}
