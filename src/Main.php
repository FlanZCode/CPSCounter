<?php

declare(strict_types=1);

namespace FlanZCode\CPSCounter;

use FlanZCode\CPSCounter\commands\CPSCommands;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {
    protected function onEnable(): void
    {
        //Config
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig("config.yml");

        //Commands
        $this->getServer()->getCommandMap()->registerAll('commands',  [
            new CPSCommands($this)
        ]);
        //Other
        $this->getLogger()->info("CPSCounter plugin activated - By FlanZCode");
    }

    protected function onDisable(): void
    {
        $this->getLogger()->info("CPSCounter plugin disabled - By FlanZCode");
    }
}
