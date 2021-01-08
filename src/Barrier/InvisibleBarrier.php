<?php

namespace Barrier;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\Server;

class InvisibleBarrier extends PluginBase implements Listener {

	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->saveDefaultConfig();
		// $this->getLogger()->info(TextFormat::BOLD . TextFormat::DARK_AQUA . " InvisibleBarrier has been enabled");
	}

	public function onMove(PlayerMoveEvent $event) {
		$player = $event->getPlayer();
		if ($this->isInside($player->getPosition(), $pos1, $pos2)) {
			$player->teleport($event->getFrom());
			$player->sendMessage($this->getConfig()->get("message"));
		}
	}

	private function isInside(Position $position, Position $p1, Position $p2) {
		return ($position->getX() >= $p1->getX() && $position->getX() <= $p2->getX() && $position->getY() >= $p2->getY() && $position->getY() <= $p1->getY() && $position->getZ() >= $p1->getZ() && $position->getZ() <= $p2->getZ() && $position->getLevel()->getName() === $p1->getLevel()->getName(), $position->getLevel()->getName() === $p2->getLevel()->getName());
	}

	public function onDisable() {
		//$this->getLogger()->info(TextFormat::BOLD . TextFormat::RED . "InvisibleBarrier has been disabled");
	}

}
