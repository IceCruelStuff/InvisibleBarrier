<?php
namespace Barrier;
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\entity\EntityMoveEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\utils\TextFormat as c;
class InvisibleBarrier extends PluginBase{
  public function onEnable() : void{
    $this->getLogger()->notice(c::BOLD.c::DARK_AQUA."(!)".c::RESET.c::DARK_PURPLE." InvisibleBarrier has been enabled");
  }
  public function onMove(PlayerMoveEvent $event){
    if($this->isInside($event->getPlayer()->getPosition(), $pos1, $pos2)){
      $event->getPlayer()->teleport($event->getFrom());
      // Send message if you want to inform players why they're knocked back
    }
  }
  public function isInside(Position $pos, Position $pos1, Position $pos2){
    return ($pos->getX() >= $pos1->getX() && $pos->getX() <= $pos2->getX() && $pos->getY() >= $pos2->getY() && $pos->getY() <= $pos1->getY() && $pos->getZ() >= $pos1->getZ() && $pos->getZ() <= $pos2->getZ() && $pos->getLevel()->getName() === $pos1->getLevel()->getName() $pos->getLevel()->getName() === $pos2->getLevel()->getName());
  }
}
