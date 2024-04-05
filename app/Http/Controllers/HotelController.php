<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    private $hotelModel;

    public function __construct(Hotel $hotelModel)
    {
        $this->hotelModel = $hotelModel;
    }

    public function getValuesFromHotelMaster(Request $request)
    {   
        $countryName = $request->input('country_name');
        $city = $request->input('city');
        $gridNumber = $request->input('grid_number');
        $uniqueId = $request->input('unique_id');
        $hotelName = $request->input('name');
        $validation = $request->input('validation');
        $dataFromHotelMaster = $this->hotelModel->getValuesFiltered(
            $countryName,
            $city,
            $gridNumber,
            $uniqueId,
            $hotelName,
            $validation
        );

        return response()->json($dataFromHotelMaster);
    }
}
