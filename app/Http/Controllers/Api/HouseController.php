<?php

namespace App\Http\Controllers\Api;

use App\House;
use App\Http\Controllers\Controller;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return House::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $house = new House();
        $house->name = $request->name;
        $house->type_house = $request->type_house;
        $house->type_room = $request->type_room;
        $house->address = $request->address;
        $house->bedroom = $request->bedroom;
        $house->bathroom = $request->bathroom;
        $house->description = $request->description;
        $house->status = $request->status;
        $house->price = $request->price;
        $house->customer_id = $request->customer_id;
        $house->save();
        return response()->json($house);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(House $house, Request $request)
    {
        return $house;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, House $house)
    {
        return $house->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(House $house)
    {
        $house->delete();
    }

    public function getHouseByCustomerId($customer_id)
    {
        $houses = House::where('customer_id', $customer_id)->get();
        return response()->json($houses);
    }

    public function multiSearch(Request $request)
    {
        $result = House::query();
        if (!empty($request->name)) {
            $result = $result->where('name', 'like', '%' . $request->name . '%');
        }
        if (!empty($request->type_house)) {
            $result = $result->where('type_house', $request->type_house);
        }
        if (!empty($request->type_room)) {
            $result = $result->where('type_room', $request->type_room);
        }
        if (!empty($request->type_room)) {
            if ($request->price == 1) {
                $result = $result->where('price', '<', 1000000);
            }
            if ($request->price == 2) {
                $result = $result->whereBetween('price', [1000000, 2000000]);
            }
            if ($request->price == 3) {
                $result = $result->where('price', '>', 2000000);
            }
        }
        if (!empty($request->address)) {
            $result = $result->where('address', 'like', '%' . $request->address . '%');
        }
        $data = $result->get();
        if (empty($data)){
            return response()->json([
                'status' => 200,
                'message' => 'Khong co du lieu'
            ]);
        }
        return response()->json($data);

    }

}
