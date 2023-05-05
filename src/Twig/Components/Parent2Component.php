<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('parent2')]
final class Parent2Component
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public string $animal = 'Dino';
}
