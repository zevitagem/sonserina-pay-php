<?php

declare(strict_types=1);

namespace App\Domain\Contracts;

interface ReceptorEmailClientInterface
{

    public function getEmail(): string;
}
