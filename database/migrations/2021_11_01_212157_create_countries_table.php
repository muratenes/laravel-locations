<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use MuratEnes\Regions\Models\Country;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->string('code');
        });
        // seeder

        $countryJson = json_decode(file_get_contents(__DIR__ . '/../seeds/files/countries.json', true));
        foreach ($countryJson as $country) {
            $country = (array) $country;
            Country::firstOrCreate([
                'name' => $country['Name'],
                'code'  => $country['Code'],
            ]);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
