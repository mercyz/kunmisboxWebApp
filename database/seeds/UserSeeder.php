<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        factory(User::class)->create([
            'name' => 'Kunmisbox',
            'email' => 'toba@kunmisbox.com.ng',
            'email_verified_at' => now(),
            'password' => bcrypt('#kUnMisBox2020'),
            'remember_token' => Str::random(10),
            'status' => 1,
        ]);
    }
}
