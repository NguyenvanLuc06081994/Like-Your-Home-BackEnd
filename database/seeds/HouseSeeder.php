<?php

use Illuminate\Database\Seeder;

class HouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $house = new \App\House();
        $house->name = 'Red Dragon Aparment';
        $house->type_house = 'HomeStay';
        $house->type_room = 'Vip';
        $house->address = '259 Lac Long Quan, Cau Giay, Ha Noi';
        $house->bedroom = '3';
        $house->bathroom = '2';
        $house->description = 'Phong tien nghi, sach se, co view ho Tay';
        $house->price = '600000';
        $house->image = 'https://gialonghousing.com/images/products/20171261443571.JPG';
        $house->customer_id = '1';
        $house->save();
        $house = new \App\House();
        $house->name = 'Violet Aparment';
        $house->type_house = 'Pen house';
        $house->type_room = 'Vip';
        $house->address = '8 Le Duc Tho, Nam Tu Liem, Ha Noi';
        $house->bedroom = '5';
        $house->bathroom = '3';
        $house->description = 'Phong co cho de oto, sach se, co view ho Tay';
        $house->price = '900000';
        $house->image = 'https://cdn.nhadat.net/public/files/2018/08/21/posts/cho-thue-nha-quan-tay-ho-co-san-vuon-rong-va-ao-ca-dep-lung-linh-1.jpg';
        $house->customer_id = '2';
        $house->save();
    }
}
