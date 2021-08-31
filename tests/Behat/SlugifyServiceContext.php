<?php

declare(strict_types=1);

namespace App\Tests\Behat;

use App\Service\SlugifyService;
use Behat\Behat\Context\Context;
use PHPUnit\Framework\TestCase;

class SlugifyServiceContext extends TestCase implements Context
{
    private SlugifyService $slugifyService;

    private string $string;

    public function __construct(SlugifyService $slugifyService)
    {
        $this->slugifyService = $slugifyService;
    }

    /**
     * @Given (que) j'ai une string :string
     */
    public function jaiUneString(string $string): void
    {
        $this->string = $string;
    }

    /**
     * @Then j'obtiens le slug suivant :string
     */
    public function jobtiensLeSlug(string $string): void
    {
        TestCase::assertSame($string, $this->slugifyService->generate($this->string));
    }
}
