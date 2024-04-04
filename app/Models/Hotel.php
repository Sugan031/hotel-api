<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hotel extends Model {
    use HasFactory;

    protected $table = "sample_hotel_data";
    public function getValues() {
            return self::paginate(5);
    }

    public function getValuesFiltered($countryName=null,$city=null,$gridNumber=null,$uniqueId=null,$hotelName=null,$validation=null){

         $query = self::query();
         if ($countryName) {
            $query->where('country_name', $countryName);
        }
        if ($city) {
            $query->where('city', $city);
        }
        if ($gridNumber) {
            $query->where('grid_number', $gridNumber);
        }
        if ($uniqueId) {
            $query->where('unique_id', $uniqueId);
        }

        if ($hotelName) {
            $query->where('name',$hotelName);
        }

        if($validation){
             $query->where('validation',$validation);
        }

        $data = $query->paginate(20);

        return $data;
    }
}
