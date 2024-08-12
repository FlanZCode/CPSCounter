<?php

namespace FlanZCode\CPSCounter\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class CPSCommands extends Command
{
    private $plugin;

    public function __construct($plugin)
    {
        parent::__construct("cps", "See your CPS - By FlanZCode", "/cps");
        $this->plugin = $plugin;
        $this->setPermission("cps.use");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool
    {
        $config = new Config($this->plugin->getDataFolder() . "config.yml", Config::YAML);
        if(!$sender instanceof Player) {
            $sender->sendMessage($config->get("not-a-player"));
            return false;
        }

        $sender->sendMessage($config->get("cps-msg"));
        return true;
    }
}