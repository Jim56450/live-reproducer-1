<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('child')]
final class ChildComponent
{
    use DefaultActionTrait;

    #[LiveProp(updateFromParent: true, writable: true)]
    public string $animal = 'Saur';
}
