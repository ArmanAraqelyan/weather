<?php

namespace App\Dto;

final class DestinationDto
{
    private float $latitude;
    private float $longitude;

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     * @return DestinationDto
     */
    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     * @return DestinationDto
     */
    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;
        return $this;
    }

    public static function init(array $destination): self
    {
        return (new self())
            ->setLatitude($destination['latitude'])
            ->setLongitude($destination['longitude']);
    }
}
