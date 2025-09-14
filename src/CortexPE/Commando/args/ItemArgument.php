<?php

declare(strict_types=1);

namespace CortexPE\Commando\args;

use pocketmine\command\CommandSender;

use pocketmine\item\Item;
use pocketmine\item\StringToItemParser;

class ItemArgument extends StringEnumArgument {

    protected static array $VALUES = [];

    public function __construct() {
        if (empty(self::$VALUES)) {
            foreach (StringToItemParser::getInstance()->getKnownAliases() as $alias) {
                self::$VALUES[$alias] = $alias;
            }
        }
    }

    public function getTypeName() : string{
        return "item";
    }

    public function getEnumName() : string{
        return "item";
    }

    public function parse(string $argument, CommandSender $sender) : Item {
        $item = StringToItemParser::getInstance()->parse($argument);

        if ($item === null) {
            throw new \InvalidArgumentException("Invalid item ID: " . $argument);
        }

        return $item;
    }
}
