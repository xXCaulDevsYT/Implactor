<?php
/*
*
*  _____                 _            _             
* |_   _|               | |          | |            
*   | |  _ __ ___  _ __ | | __ _  ___| |_ ___  _ __ 
*   | | | '_ ` _ \| '_ \| |/ _` |/ __| __/ _ \| '__|
*  _| |_| | | | | | |_) | | (_| | (__| || (_) | |   
* |_____|_| |_| |_| .__/|_|\__,_|\___|\__\___/|_|   
*                 | |                               
*                 |_|                               
*
* Implactor (1.4.x | 1.5.x)
* A plugin with some features for Minecraft: Bedrock!
* --- = ---
*
* Team: ImpladeDeveloped
* 2018 (c) Zadezter
*
*/

declare(strict_types=1);

namespace Implactor\anti;

use Implactor\MainIR;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\Player;

class AntiAdvertising implements Listener{

    /** @var Core */
    private $plugin;
    /** @var array */
    private $links;

    public function __construct(MainIR $plugin){
        $this->plugin = $plugin;
        $this->links = [".leet.cc", ".playmc.pe", ".net", ".com", ".us", ".co", ".co.uk", ".ddns", ".ddns.net", ".cf", ".pe", ".me", ".cc", ".ru", ".eu", ".tk", ".gq", ".ga", ".ml", ".org", ".1", ".2", ".3", ".4", ".5", ".6", ".7", ".8", ".9", "my server", "my sever", "ma server", "mah server", "ma sever", "mah sever"];
    }

    public function onChat(PlayerChatEvent $ev) : void{
        $msg = $ev->getMessage();
        $player = $ev->getPlayer();
        if(!$player instanceof Player) return;
        if($player->hasPermission("implactor.anti")){
        }else{
            foreach($this->links as $links){
                if(strpos($msg, $links) !== false){
                    $player->sendMessage("§l§7(§c!§7)§r §cDo not advertising links on this chat, idiot!");
                    $ev->setCancelled();
                    return;
                }
            }
        }
    }
}
