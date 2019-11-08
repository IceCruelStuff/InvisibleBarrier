<?php

declare(strict_types=1);

namespace Barrier;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as C;

class InvisibleBarrier extends PluginBase implements Listener {
  
	public function onEnable() : void{
		$this->getLogger()->notice(C::BOLD.C::DARK_AQUA."(!)".C::RESET.C::DARK_PURPLE." InvisibleBarrier has been enabled");
		$this->getServer()->getPluginManager()->registerEvents($this);
	}
	public function onMove(PlayerMoveEvent $event){
		if($this->isInside($event->getPlayer()->getPosition(), $pos1, $pos2)){
			//Send message if you want to inform players why they're knocked back
			$event->getPlayer()->teleport($event->getFrom());
		}
	}
	public function isInside(Position $pp, Position $p1, Position $p2){
		return ($pp->getX() >= $p1->getX() && $pp->getX() <= $p2->getX() && $pp->getY() >= $p2->getY() && $pp->getY() <= $p1->getY() && $pp->getZ() >= $p1->getZ() && $pp->getZ() <= $p2->getZ() && $pp->getLevel()->getName() === $p1->getLevel()->getName() $pp->getLevel()->getName() === $p2->getLevel()->getName());
	}
}
