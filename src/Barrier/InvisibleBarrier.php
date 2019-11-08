<?php
namespace Barrier;
use pocketmine\plugin\PluginManger;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\utils\TextFormat as c;
class InvisibleBarrier extends PlayerMoveEvent{
  public function onEnable() : void{
    $this->getLogger()->notice(c::BOLD.c::DARK_AQUA."(!)".c::RESET.c::DARK_PURPLE." InvisibleBarrier has been enabled");
  }
  public function onMove(PlayerMoveEvent $event){
    if($this->isInside($event->getPlayer()->getPosition(), $pos1, $pos2)){
      $event->getPlayer()->teleport($event->getFrom());
      // Send message if you want to inform players why they're knocked back
    }
  }
  public function isInside(Position $pp, Position $p1, Position $p2){
    return ($pp->getX() >= $p1->getX() && $pp->getX() <= $p2->getX() && $pp->getY() >= $p2->getY() && $pp->getY() <= $p1->getY() && $pp->getZ() >= $p1->getZ() && $pp->getZ() <= $p2->getZ() && $pp->getLevel()->getName() === $p1->getLevel()->getName() $pp->getLevel()->getName() === $p2->getLevel()->getName());
  }
}
