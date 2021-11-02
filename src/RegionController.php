<?php

namespace MuratEnes\Regions;

use App\Http\Controllers\Controller;
use MuratEnes\Regions\Models\Country;
use MuratEnes\Regions\Models\District;
use MuratEnes\Regions\Models\State;

class RegionController extends Controller
{
    /**
     * all countries
     * @return mixed
     */
    public function countries()
    {
        return Country::orderBy('name')->get();
    }

    /**
     * all states by country
     *
     * @param int $countryId
     * @return mixed
     */
    public function states($countryId)
    {
        return State::where(['country_id' => $countryId])
            ->orderBy('title')->get();
    }

    /**
     * all states by country
     * @param int $stateId
     * @return mixed
     */
    public function districts($stateId)
    {
        return District::where(['state_id' => $stateId])
            ->orderBy('title')->get();
    }
}
