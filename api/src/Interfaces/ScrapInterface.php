<?php
namespace App\Interfaces;
interface ScrapInterface
{
  public function  getData(string $url,int $cant);
}