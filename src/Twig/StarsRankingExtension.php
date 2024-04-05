<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class StarsRankingExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('stars', [$this, 'stars'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * {@ingeritdoc}
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('stars', [$this, 'stars'], ['is_safe' => ['html']])
        ];
    }
}