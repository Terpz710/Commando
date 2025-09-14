<?php

declare(strict_types=1);

namespace CortexPE\Commando\args;

use pocketmine\command\CommandSender;

class ColorArgument extends StringEnumArgument {

    protected const VALUES = [
        "white" => "white",
        "orange" => "orange",
        "magenta" => "magenta",
        "light_blue" => "light_blue",
        "yellow" => "yellow",
        "lime" => "lime",
        "pink" => "pink",
        "gray" => "gray",
        "light_gray" => "light_gray",
        "cyan" => "cyan",
        "purple" => "purple",
        "blue" => "blue",
        "brown" => "brown",
        "green" => "green",
        "red" => "red",
        "black" => "black",
    ];

    public function getTypeName() : string{
        return "color";
    }

    public function getEnumName() : string{
        return "color";
    }

    public function parse(string $argument, CommandSender $sender) : string {
        return $this->getValue($argument);
    }
}
