<?php

namespace Classes\Interfaces;

interface Deliverable 
{
    public function deliver(string $adres): void;
}