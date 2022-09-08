<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\PersonalDetail;
use App\Models\BusinessDetail;
use App\Models\Product;



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
                'user_id'             => '1',
                'name'                => 'Admin',
                'mobile_number'                =>    null,
                'dob'                =>    null,
                'civil_status'                =>    null,
                'citizenship'                =>    null,
                'address'   =>   null,
                'province_code'   =>   null,
                'city_municipality_code'   =>   null,
                'source_of_fund'   => null,
                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'user_id'             => '2',
                'name'                => 'Johnpaul Tanion',
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
                'business_name'     => 'Supsofttech', 
                'business_address'     => 'Antipolo City',
                'business_phone'     => '09776668820',
                'business_province_code'     => '0458',
                'business_city_municipality_code'     => '045802',
                'business_permit'     => '3_Computer 123.jpg',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];


        $products = [
            [
                'user_id'             => '2',
                'image'             => '2_Gaming Chair.jpg',
                'product_id'             => 'PROD4400702',
                'title'             => 'Gaming Chair',
                'price'             => '1500',
                'qty'             => '5',
                'category'             => 'Computer Item',
                'expiration'             => null,
                'description'             => 'test',
                'status'             => 'APPROVED',
                'condition'             => 'New',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'user_id'             => '2',
                'image'             => '2_Mouse.png',
                'product_id'             => 'PROD4411952',
                'title'             => 'Mouse',
                'price'             => '150',
                'qty'             => '5',
                'category'             => 'Computer Item',
                'expiration'             => null,
                'description'             => 'test',
                'status'             => 'APPROVED',
                'condition'             => 'New',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'user_id'             => '2',
                'image'             => '2_CCTV.jpg',
                'product_id'             => 'PROD6487602',
                'title'             => 'CCTV',
                'price'             => '650',
                'qty'             => '5',
                'category'             => 'Computer Item',
                'expiration'             => null,
                'description'             => 'test',
                'status'             => 'APPROVED',
                'condition'             => 'New',

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];

        
        User::insert($accounts);
        PersonalDetail::insert($details);
        BusinessDetail::insert($bdetails);
        Product::insert($products);
     
        
    }
}
