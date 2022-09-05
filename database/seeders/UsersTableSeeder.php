<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\PersonalDetail;
use App\Models\BusinessDetail;



class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $accounts = [
            [
                'id'             => '1',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$vUIzDlvfpu2yOATsPYcPaOTY/zgbgwViLIWSfZxSlmRBFV.g/fmOW',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'remember_token' => null,
                'reg_step'         => 'STEP1',
                'status'        => 'PENDING',
                'isSubmit'      => '0',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => '2',
                'email'          => 'johnpaultanion001@gmail.com',
                'password'       => '$2y$10$vUIzDlvfpu2yOATsPYcPaOTY/zgbgwViLIWSfZxSlmRBFV.g/fmOW',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'remember_token' => null,
                'reg_step'         => 'STEP3',
                'status'        => 'APPROVED',
                'isSubmit'      => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            
        ];

        $details = [
            [
                'user_id'             => '2',
                'name'                => 'Johnpaul Client',
                'mobile_number'                => '09776668820',
                'dob'                => '2000-02-21',
                'civil_status'                => 'Single',
                'citizenship'                => 'Filipino',
                'address'   => 'Antipolo City',
                'province_code'   => '0458',
                'city_municipality_code'   => '045802',
                'source_of_fund'   => 'Others',
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        $bdetails = [
            [
                'user_id'             => '2',
                'business_industry'     => 'Computer Company',
                'business_name'     => 'Computer 123', 
                'business_address'     => 'Antipolo City',
                'business_phone'     => '09776668820',
                'business_province_code'     => '0458',
                'business_city_municipality_code'     => '045802',
                'business_permit'     => '3_Computer 123.jpg',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        
        User::insert($accounts);
        PersonalDetail::insert($details);
        BusinessDetail::insert($bdetails);
     
        
    }
}
