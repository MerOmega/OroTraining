<?php

namespace Fantasy\Bundle\DemoBundle\Enum;

enum EType: string
{
    case WEB   = 'web';
    case LOCAL = 'local';
    case DUAL  = 'dual';

    public function getLabel(): string
    {
        return match ($this) {
            self::WEB => 'Web',
            self::LOCAL => 'Local',
            self::DUAL => 'Dual',
            default => 'N/A',
        };
    }

    public static function getChoices(): array
    {
        $choices = [];
        foreach (self::cases() as $enum) {
            $choices[$enum->getLabel()] = $enum;
        }
        return $choices;
    }
}
