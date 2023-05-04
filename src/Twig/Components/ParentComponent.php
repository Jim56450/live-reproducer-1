<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('parent')]
final class ParentComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public string $animal = 'Dino';
}
