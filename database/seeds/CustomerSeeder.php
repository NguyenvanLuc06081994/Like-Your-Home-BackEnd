<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new \App\Customer();
        $customer->username = 'Viet Anh Vu';
        $customer->email = 'vietanh@gmail.com';
        $customer->phone = '0972576832';
        $customer->address = 'Lac Long Quan, Cau Giay, Ha Noi';
        $customer->password = '12345678';
        $customer->image = 'https://scontent.fhan3-3.fna.fbcdn.net/v/t1.0-9/30724387_1745343345559687_146428869778341888_o.jpg?_nc_cat=101&_nc_sid=174925&_nc_ohc=H67MhgJSck4AX_ftaxA&_nc_ht=scontent.fhan3-3.fna&oh=adcedd375212be5a907142c61089dc09&oe=5F8830A6';
        $customer->save();
        $customer = new \App\Customer();
        $customer->username = 'Bui Minh Quang';
        $customer->email = 'minhquang@gmail.com';
        $customer->phone = '0966123456';
        $customer->address = 'Lac Long Quan, Cau Giay, Ha Noi';
        $customer->password = '12345678';
        $customer->image = 'https://scontent.fhan3-3.fna.fbcdn.net/v/t1.0-9/30724387_1745343345559687_146428869778341888_o.jpg?_nc_cat=101&_nc_sid=174925&_nc_ohc=H67MhgJSck4AX_ftaxA&_nc_ht=scontent.fhan3-3.fna&oh=adcedd375212be5a907142c61089dc09&oe=5F8830A6';
        $customer->save();
    }
}
