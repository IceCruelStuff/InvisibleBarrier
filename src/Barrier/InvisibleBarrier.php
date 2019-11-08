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
  public function isInside(Position $pp, Position $p1, Position $p2){
    return ($pp->getFloorX() >= $p1->getFloorX() && $pp->getFloorX() <= $p2->getFloorX() && $pp->getFloorY() >= $p2->getFloorY() && $pp->getFloorY() <= $p1->getFloorY() && $pp->getFloorZ() >= $p1->getFloorZ() && $pp->getFloorZ() <= $p2->getFloorZ() && $pp->getLevel()->getName() === $p1->getLevel()->getName() $pp->getLevel()->getName() === $p2->getLevel()->getName());
  }
}
