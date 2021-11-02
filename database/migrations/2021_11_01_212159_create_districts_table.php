<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use MuratEnes\Regions\Models\Country;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(1);
            $table->string('title', 100);

            $table->unsignedInteger('state_id');

            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
        });
        $this->insertTurkeyCities(Country::where('name', 'Turkey')->first());
    }

    private function insertTurkeyCities(Country $turkey)
    {
        $turkeyCities = json_decode(file_get_contents(__DIR__ . '/../seeds/files/turkey.json'), true);
        foreach ($turkeyCities as $index => $state) {
            $stateModel = $turkey->states()->firstOrCreate(['title' => $index]);
            foreach ($state as $index2 => $towns) {
               $stateModel->districts()->firstOrCreate(['title' => $index2]);
            }
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
