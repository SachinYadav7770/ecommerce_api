<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('product')->insert([
            [
                'name'=>'LG',
                'price'=>'18000',
                'category'=>'Mobile',
                'description'=>'This is a mobile in lg company',
                'gallery'=>'https://www.lg.com/levant_en/images/plp-b2c/levanten-smartphones-hero-1-m.jpg',
            ],
            [
                'name'=>'Sony',
                'price'=>'43300',
                'category'=>'Mobile',
                'description'=>'This is a mobile in sony company',
                'gallery'=>'https://www.xda-developers.com/files/2021/03/Screenshot-2021-03-03-at-16.56.42.jpg',
            ],
            [
                'name'=>'LG',
                'price'=>'95000',
                'category'=>'TV',
                'description'=>' LG 55LA9700 4K 240Hz TV . This is a tv in lg company',
                'gallery'=>'https://www.lg.com/us/images/tvs/55la9700/gallery/large03.jpg',
            ],
            [
                'name'=>'Apple',
                'price'=>'45000',
                'category'=>'Watch',
                'description'=>'Apple Watch Nike Series 6 This is a Apple Watch in Apple company',
                'gallery'=>'https://maplestore.in/wp-content/uploads/2020/10/Series-6-Nike.png',
            ],
            [
                'name'=>'Google',
                'price'=>'180000',
                'category'=>'Glass',
                'description'=>'This is a glass in google company',
                'gallery'=>'https://cdn11.bigcommerce.com/s-qnk96/product_images/uploaded_images/glass-3qfloating-ti-r6-2.jpg',
            ],
            [
                'name'=>'Sony',
                'price'=>'49000',
                'category'=>'Game Console',
                'description'=>'Sony’s powerful next-generation game console. This is a Game Console in sony company',
                'gallery'=>'https://cdn.idropnews.com/wp-content/uploads/2020/12/01162746/PS5-Giveaway-Enter-to-Win-a-Free-PlayStation-5.jpg',
            ]
        ]);
    }
}
