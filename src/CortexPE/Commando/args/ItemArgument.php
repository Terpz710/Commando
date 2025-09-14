<?php

declare(strict_types=1);

namespace CortexPE\Commando\args;

use pocketmine\command\CommandSender;

use pocketmine\item\Item;
use pocketmine\item\StringToItemParser;

use pocketmine\network\mcpe\protocol\AvailableCommandsPacket;

class ItemArgument extends BaseArgument {

    public function getTypeName() : string{
        return "item";
    }

    public function getNetworkType() : int{
        return AvailableCommandsPacket::ARG_TYPE_STRING;
    }

    public function canParse(string $testString, CommandSender $sender) : bool{
        return StringToItemParser::getInstance()->parse($testString) !== null;
    }

    public function parse(string $argument, CommandSender $sender) : Item{
        $item = StringToItemParser::getInstance()->parse($argument);

        if($item === null){
            throw new \InvalidArgumentException("Invalid item ID: " . $argument);
        }

        return $item;
    }
}
