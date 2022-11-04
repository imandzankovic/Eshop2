<?php

use Illuminate\Database\Seeder;

class orderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_models')->insert([
            'adress'=>'Minya 34509',
            'customer'=>'Ahmed Hikel',
            'phone'=>'7651234',
            'product_id'=>'1',
        ]);
    }
}
