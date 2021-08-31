<?php

declare(strict_types=1);

namespace App\Tests\Behat;

use App\Entity\Contact;
use PHPUnit\Framework\TestCase;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use App\Repository\ContactRepository;

class ContactRepositoryContext extends TestCase implements Context
{
    private ContactRepository $contactRepository;

    private string $email;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * @Given (que) l'entrepreneur :email a déjà envoyé des messages
     * @Given (que) l'entrepreneur :email n'a pas envoyé de message
     */
    public function jAiLEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @Then la méthode findByEntrepreuneurEmail me retourne un tableau contenant ces messages
     */
    public function laMethodeFindbyentrepreuneuremailMeRetourneUnTableauContenantMessages(): void
    {
        TestCase::assertNotEmpty($this->contactRepository->findByEntrepreuneurEmail($this->email));
        TestCase::assertTrue($this->contactRepository->findByEntrepreuneurEmail($this->email)[0] instanceof Contact);
    }

    /**
     * @Then la méthode findByEntrepreuneurEmail retourne un tableau vide
     */
    public function laMethodeFindbyentrepreuneuremailMeRetourneUnTableauVide(): void
    {
        TestCase::assertEmpty($this->contactRepository->findByEntrepreuneurEmail($this->email));
    }
}
