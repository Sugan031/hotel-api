<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    private $dataFromDb;

    public function __construct(Hotel $dataFromDb)
    {
        $this->dataFromDb = $dataFromDb;
    }

    public function getValuesFromdb()
    {

        $credentials = $this->dataFromDb->getValues();

        return response()->json($credentials);
    }

    public function getValuesFromdbSearched(Request $request)
    {

        $countryName = $request->input('country_name');
        $city = $request->input('city');
        $gridNumber = $request->input('grid_number');
        $uniqueId = $request->input('unique_id');
        $hotelName = $request->input('name');
        $validation = $request->input('validation');
        $credentials = $this->dataFromDb->getValuesFiltered(
            $countryName,
            $city,
            $gridNumber,
            $uniqueId,
            $hotelName,
            $validation
        );
        return response()->json($credentials);
    }
}
