<?php

namespace App\Models;

class SingleManning
{
    /**
     * int
     *
     * @var int $monday
     */
    private int $monday = 0;

    /**
     * int
     *
     * @var int $tuesday
     */
    private int $tuesday = 0;

    /**
     * int
     *
     * @var int $wednesday
     */
    private int $wednesday = 0;

    /**
     * int
     *
     * @var int $thursday
     */
    private int $thursday = 0;

    /**
     * int
     *
     * @var int $friday
     */
    private int $friday = 0;

    /**
     * int
     *
     * @var int $saturday
     */
    private int $saturday = 0;

    /**
     * int
     *
     * @var int $sunday
     */
    private int $sunday = 0;

    /**
     * Get the value of monday
     *
     * @return int
     */
    public function getMonday(): int
    {
        return $this->monday;
    }

    /**
     * Set the value of monday
     *
     * @param int $monday
     *
     * @return self
     */
    public function setMonday(int $monday): self
    {
        $this->monday = $monday;

        return $this;
    }

    /**
     * Get the value of tuesday
     *
     * @return int
     */
    public function getTuesday(): int
    {
        return $this->tuesday;
    }

    /**
     * Set the value of tuesday
     *
     * @param int $tuesday
     *
     * @return self
     */
    public function setTuesday(int $tuesday): self
    {
        $this->tuesday = $tuesday;

        return $this;
    }

    /**
     * Get the value of wednesday
     *
     * @return int
     */
    public function getWednesday(): int
    {
        return $this->wednesday;
    }

    /**
     * Set the value of wednesday
     *
     * @param int $wednesday
     *
     * @return self
     */
    public function setWednesday(int $wednesday): self
    {
        $this->wednesday = $wednesday;

        return $this;
    }

    /**
     * Get the value of thursday
     *
     * @return int
     */
    public function getThursday(): int
    {
        return $this->thursday;
    }

    /**
     * Set the value of thursday
     *
     * @param int $thursday
     *
     * @return self
     */
    public function setThursday(int $thursday): self
    {
        $this->thursday = $thursday;

        return $this;
    }

    /**
     * Get the value of friday
     *
     * @return int
     */
    public function getFriday(): int
    {
        return $this->friday;
    }

    /**
     * Set the value of friday
     *
     * @param int $friday
     *
     * @return self
     */
    public function setFriday(int $friday): self
    {
        $this->friday = $friday;

        return $this;
    }

    /**
     * Get the value of saturday
     *
     * @return int
     */
    public function getSaturday(): int
    {
        return $this->saturday;
    }

    /**
     * Set the value of saturday
     *
     * @param int $saturday
     *
     * @return self
     */
    public function setSaturday(int $saturday): self
    {
        $this->saturday = $saturday;

        return $this;
    }

    /**
     * Get the value of sunday
     *
     * @return int
     */
    public function getSunday(): int
    {
        return $this->sunday;
    }

    /**
     * Set the value of sunday
     *
     * @param int $sunday
     *
     * @return self
     */
    public function setSunday(int $sunday): self
    {
        $this->sunday = $sunday;

        return $this;
    }

    /**
     * Set the value of a given day
     *
     * @param String $dayName
     * @param int $minutes   
     * 
     * @return self
     */
    public function set(String $dayName, int $minutes): self
    {
        if (method_exists($this, "set$dayName")) {
            $this->{"set$dayName"}($minutes);
        }

        return $this;
    }

    /**
     * Get the collection of days as a plain array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'monday'    => $this->getMonday(),
            'tuesday'   => $this->getTuesday(),
            'wednesday' => $this->getWednesday(),
            'thursday'  => $this->getThursday(),
            'friday'    => $this->getFriday(),
            'saturday'  => $this->getSaturday(),
            'sunday'    => $this->getSunday()
        ];
    }
}
