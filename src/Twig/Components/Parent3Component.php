<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('parent3')]
final class Parent3Component
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public string $animal = 'Dino';
}
