<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static SinglePlayer()
 * @method static static MultiPlayer()
 * @method static static Co_op()
 * @method static static Party()
 */
final class PlayerType extends Enum
{
    const SinglePlayer = "Singleplayer";
    const MultiPlayer = "Multiplayer";
    const Co_op = "Co-op";
    const Party = "Party";
}
