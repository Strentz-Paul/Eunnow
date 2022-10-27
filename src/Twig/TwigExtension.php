<?php

declare(strict_types=1);

namespace App\Twig;

use App\Helper\StringHelper;
use App\ViewModel\AbstractTirage;
use Doctrine\Common\Collections\Collection;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TwigExtension extends AbstractExtension
{
    /**
     * @return TwigFunction[]
     */
    public function getFunctions(): array
    {
        return array(
            new TwigFunction('remove_text', array($this, 'removeText')),
            new TwigFunction('format_money', array($this, 'formatMoney')),
        );
    }

    /**
     * @param string $needle
     * @param string $haystack
     * @return string
     */
    public function removeText(string $needle, string $haystack): string
    {
        return StringHelper::removeTextFromString($needle, $haystack);
    }

    /**
     * @param float $number
     * @return string
     */
    public function formatMoney(float $number): string
    {
        return number_format($number, 2, ',', ' ');
    }
}
