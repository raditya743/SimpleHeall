<?php

declare(strict_types=1);

namespace Electro\SimpleHeal;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{
	
          public function onCommand(CommandSender $sender,Command $cmd,string $label,array $args) : bool{
           if ($sender instanceof Player) {
               if ($cmd->getName() == "heal") {
                   if (isset($args[0])){
                       $player = $this->getServer()->getPlayer($args[0]);
                       if ($player){
                           $player->setHealth(20);
                           $player->sendMessage("§akamu sudah sembuh!");
                           $sender->sendMessage("§akamu sudah sembuh " . $args[0] . "!");
                       }
                       else{
                           $sender->sendMessage("§cPemain ini tidak ada");
                       }
                   }
                   else {
                       $sender->setHealth(20);
                       $sender->sendMessage("§akamu sudah sembuh!");
                   }
               }
           }
           else{
               $sender->sendMessage("§cAnda harus dalam game untuk menggunakan perintah ini!");
           }
          return true;

		}

}
