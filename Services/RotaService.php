<?php

namespace App\Services;

use App\Models\Rota;
use App\Models\SingleManning;
use Illuminate\Support\Collection;

class RotaService
{
    /**
     * Rota
     *
     * @var Rota $rota
     */
    private Rota $rota;

    public function __construct(Rota $rota)
    {
        $this->rota = $rota;
    }

    public function getSingleManning(): SingleManning
    {
        $singleManning = new SingleManning();

        $this->rota->staffs
            ->groupBy(fn ($staff) => $staff->pivot->start_time->dayName)
            ->transform(fn ($dayStaff) => $this->getMinutes($dayStaff))
            ->each(function ($minutes, $day) use ($singleManning) {
                $singleManning->set($day, $minutes);
            });

        return $singleManning;
    }

    private function getMinutes(Collection $dayStaff): int
    {
        $singleManningMinutes = 0;
        $earliestStartTime    = $dayStaff->pluck('pivot.start_time')->min();
        $latestEndTime        = $dayStaff->pluck('pivot.end_time')->max();
        $shiftPeriod          = $earliestStartTime->minutesUntil($latestEndTime);

        foreach ($shiftPeriod as $minute) {

            $matchingStaff = $dayStaff->filter(fn ($staff) => ($minute >= $staff->pivot->start_time && $minute < $staff->pivot->end_time));

            if ($matchingStaff->count() == 1) {
                $singleManningMinutes++;
            }
        }

        return $singleManningMinutes;
    }
}
