<?php

namespace Tests\Unit;

use App\Models\Rota;
use App\Models\Shop;
use App\Models\Staff;
use App\Services\RotaService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;
use Tests\CreatesApplication;

class RotaTest extends TestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    /**
     *
     * Given - Black Widow working at FunHouse on Monday in one long shift (9am - 5pm)
     * When  - no-one else works during the day
     * Then  - Black Widow receives single manning supplement for the whole duration of her shift.
     *
     * @return void
     */
    public function test_scenario_one()
    {
        $shop       = Shop::create(['name' => 'FunHouse']);
        $rota       = $shop->rotas()->save(new Rota(['week_commence_date' => today()->startOfWeek()]));
        $blackWidow = $shop->staffs()->save(new Staff(['first_name' => 'Black', 'surname' => 'Widow']));

        $rota->staffs()->attach($blackWidow->id, ['start_time' => today()->previous('monday')->setHour(9), 'end_time' => today()->previous('monday')->setHour(17)]);

        $rotaService   = new RotaService($rota);
        $singleManning = $rotaService->getSingleManning();

        $expectedSingleManningMinutes = 480;

        return $this->assertEquals($expectedSingleManningMinutes, $singleManning->getMonday());
    }

    /**
     * 
     * Given - Black Widow and Thor working at FunHouse on Tuesday (BW: 9am - 1pm, Thor: 1pm - 5pm)
     * When  - they only meet at the door to say hi and bye
     * Then  - Black Widow receives single manning supplement for the whole duration of her shift
     *         And Thor also receives single manning supplement for the whole duration of his shift.
     *
     * @return void
     */
    public function test_scenario_two()
    {
        $shop       = Shop::create(['name' => 'FunHouse']);
        $rota       = $shop->rotas()->save(new Rota(['week_commence_date' => today()->startOfWeek()]));
        $blackWidow = $shop->staffs()->save(new Staff(['first_name' => 'Black', 'surname' => 'Widow']));
        $thor       = $shop->staffs()->save(new Staff(['first_name' => 'Thor', 'surname' => 'Odinson']));

        $rota->staffs()->attach($blackWidow->id, ['start_time' => today()->previous('tuesday')->setHour(9), 'end_time' => today()->previous('tuesday')->setHour(13)]);
        $rota->staffs()->attach($thor->id, ['start_time' => today()->previous('tuesday')->setHour(13), 'end_time' => today()->previous('tuesday')->setHour(17)]);

        $rotaService   = new RotaService($rota);
        $singleManning = $rotaService->getSingleManning();

        $expectedSingleManningMinutes = 240 + 240;

        return $this->assertEquals($expectedSingleManningMinutes, $singleManning->getTuesday());
    }

    /**
     * 
     * Given - Wolverine and Gamora working at FunHouse on Wednesday
     * When  - Wolverine works in the morning shift (9am - 12pm)
     *         And Gamora works the whole day, starting slightly later than Wolverine (11am - 5pm)
     * Then  - Wolverine receives single manning supplement until Gamorra starts her shift
     *         And Gamorra receives single manning supplement starting when Wolverine has finished his shift, until the end of the day.
     *
     * @return void
     */
    public function test_scenario_three()
    {
        $shop      = Shop::create(['name' => 'FunHouse']);
        $rota      = $shop->rotas()->save(new Rota(['week_commence_date' => today()->startOfWeek()]));
        $wolverine = $shop->staffs()->save(new Staff(['first_name' => 'Wolverine', 'surname' => '']));
        $gamora    = $shop->staffs()->save(new Staff(['first_name' => 'Gamora', 'surname' => '']));

        $rota->staffs()->attach($wolverine->id, ['start_time' => today()->previous('wednesday')->setHour(9), 'end_time' => today()->previous('wednesday')->setHour(12)]);
        $rota->staffs()->attach($gamora->id, ['start_time' => today()->previous('wednesday')->setHour(11), 'end_time' => today()->previous('wednesday')->setHour(17)]);

        $rotaService   = new RotaService($rota);
        $singleManning = $rotaService->getSingleManning();

        $expectedSingleManningMinutes = 120 + 300;

        return $this->assertEquals($expectedSingleManningMinutes, $singleManning->getWednesday());
    }
}
