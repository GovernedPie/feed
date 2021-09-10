<?php

namespace feed;

 use pocketmine\command\Command;
 use pocketmine\command\CommandSender;
 use pocketmine\command\defaults\GamemodeCommand;
 use pocketmine\entity\Effect;
 use pocketmine\entity\EffectInstance;
 use pocketmine\Player;
 use pocketmine\plugin\PluginBase;
 use pocketmine\utils\TextFormat;

 class main extends PluginBase{
     public function onEnable(){
         $this->getLogger()->info("Plugin enabled!");
     }
     public function onLoad(){
         $this->getLogger()->info("Plugin loading!");
     }
     public function onDisable(){
        $this->getLogger()->info("Pliugin disabled!");
     }
     public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{
        if(!$sender instanceof Player) return false;
        switch (strtolower($cmd->getName())){
            case "feed":
                if(!$sender->isOp()){
                    $sender->sendMessage(TextFormat::RED . "NO PERMISSION!");
                }
                $sender->addEffect(new EffectInstance(Effect::getEffect(Effect::SATURATION), 20 * 5, 0));
        }
         return false;
     }
 }
