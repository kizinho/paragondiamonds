<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableDataSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $user = new User();
        $user->full_name = 'paragondiamonds';
        $user->username = 'paragondiamonds';
        $user->type = 'admin';
        $user->ref_check = "paragondiamonds";
        $user->code = true;
        $user->email = ' info@paragondiamonds.co.uk';
        $user->password = bcrypt('secretpragonsxdiamondsnew');
        $user->save();
        $user1 = new User();
        $user1->full_name = 'user1';
        $user1->username = 'user1';
        $user1->type = 'user';
        
        $user1->ref_check = "user1";
        $user1->code = true;
        $user1->email = ' info@paragondiamonds.co.uk';
        $user1->password = bcrypt('secret');
        $user1->save();
    }

}
