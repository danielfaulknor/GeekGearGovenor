<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use GeekGearGovernor\Item;
use GeekGearGovernor\Role;
use GeekGearGovernor\Permission;
use GeekGearGovernor\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('UserTableSeeder');
        $this->call('RoleSeeder');

        Model::reguard();
    }

}

class UserTableSeeder extends Seeder {

public function run()
{
    $password = Hash::make('admin');
    User::create(['email' => 'admin@admin.com', 'password' => $password]);
}

}

class RoleSeeder extends Seeder {

public function run()
{

    $owner = new Role();
    $owner->name         = 'owner';
    $owner->display_name = 'Owner'; // optional
    $owner->description  = 'User is the owner of the assets'; // optional
    $owner->save();

    $viewall = new Role();
    $viewall->name         = 'viewall';
    $viewall->display_name = 'View All'; // optional
    $viewall->description  = 'User can view all assets'; // optional
    $viewall->save();

    $editUser = new Permission();
    $editUser->name         = 'edit-user';
    $editUser->display_name = 'Edit Users'; // optional
    // Allow a user to...
    $editUser->description  = 'edit existing users'; // optional
    $editUser->save();
    $owner->attachPermission($editUser);

    $viewPrivateAssets = new Permission();
    $viewPrivateAssets->name         = 'view-private-assets';
    $viewPrivateAssets->display_name = 'View Private Assets'; // optional
    // Allow a user to...
    $viewPrivateAssets->description  = 'view private assets'; // optional
    $viewPrivateAssets->save();
    $owner->attachPermission($viewPrivateAssets);
    $viewall->attachPermission($viewPrivateAssets);

    $viewSerials = new Permission();
    $viewSerials->name         = 'view-serials';
    $viewSerials->display_name = 'View Asset Serials'; // optional
    // Allow a user to...
    $viewSerials->description  = 'view asset serials'; // optional
    $viewSerials->save();
    $owner->attachPermission($viewSerials);

    $createAssets = new \GeekGearGovernor\Permission();
    $createAssets->name         = 'create-assets';
    $createAssets->display_name = 'Create Assets'; // optional
    // Allow a user to...
    $createAssets->description  = 'create assets'; // optional
    $createAssets->save();
    $owner->attachPermission($createAssets);

    $user = User::where('email', '=', 'admin@admin.com')->first();
    $user->attachRole($owner);


}

}
