<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username'   => 'johndoe',
                'firstname'  => 'John',
                'lastname'   => 'Doe',
                'email'      => 'john@example.com',
                'password'   => 'password',
                'role'       => 'Admin',
                'address'    => '123 Main Street',
                'city'       => 'Kuala Lumpur',
                'country'    => 'Malaysia',
                'postal'     => '50400',
                'about'      => 'System administrator and developer.',
            ],
            [
                'username'   => 'janesmith',
                'firstname'  => 'Jane',
                'lastname'   => 'Smith',
                'email'      => 'jane@example.com',
                'password'   => 'password',
                'role'       => 'Editor',
                'address'    => '456 Jalan Ampang',
                'city'       => 'Kuala Lumpur',
                'country'    => 'Malaysia',
                'postal'     => '50450',
                'about'      => 'Content editor and writer.',
            ],
            [
                'username'   => 'aliabu',
                'firstname'  => 'Ali',
                'lastname'   => 'Abu',
                'email'      => 'ali@example.com',
                'password'   => 'password',
                'role'       => 'Member',
                'address'    => '78 Persiaran Gurney',
                'city'       => 'Penang',
                'country'    => 'Malaysia',
                'postal'     => '10250',
                'about'      => 'New member exploring the platform.',
            ],
            [
                'username'   => 'sarahchen',
                'firstname'  => 'Sarah',
                'lastname'   => 'Chen',
                'email'      => 'sarah@example.com',
                'password'   => 'password',
                'role'       => 'Editor',
                'address'    => '22 Lintang Mayang',
                'city'       => 'Johor Bahru',
                'country'    => 'Malaysia',
                'postal'     => '80350',
                'about'      => 'Digital marketing specialist.',
            ],
            [
                'username'   => 'miketan',
                'firstname'  => 'Mike',
                'lastname'   => 'Tan',
                'email'      => 'mike@example.com',
                'password'   => 'password',
                'role'       => 'Member',
                'address'    => '5 Jalan SS2',
                'city'       => 'Petaling Jaya',
                'country'    => 'Malaysia',
                'postal'     => '47300',
                'about'      => null,
            ],
            [
                'username'   => 'emilywong',
                'firstname'  => 'Emily',
                'lastname'   => 'Wong',
                'email'      => 'emily@example.com',
                'password'   => 'password',
                'role'       => 'Member',
                'address'    => '99 Jalan Tun Razak',
                'city'       => 'Kuala Lumpur',
                'country'    => 'Malaysia',
                'postal'     => '50400',
                'about'      => 'Freelance graphic designer.',
            ],
            [
                'username'   => 'davidraj',
                'firstname'  => 'David',
                'lastname'   => 'Raj',
                'email'      => 'david@example.com',
                'password'   => 'password',
                'role'       => 'Admin',
                'address'    => '3 Jalan Meru',
                'city'       => 'Ipoh',
                'country'    => 'Malaysia',
                'postal'     => '30020',
                'about'      => 'Co-founder and lead developer.',
            ],
            [
                'username'   => 'linawati',
                'firstname'  => 'Lina',
                'lastname'   => 'Wati',
                'email'      => 'lina@example.com',
                'password'   => 'password',
                'role'       => 'Member',
                'address'    => null,
                'city'       => null,
                'country'    => null,
                'postal'     => null,
                'about'      => null,
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}