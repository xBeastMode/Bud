<?php
namespace Bud\SideEffects;
use pocketmine\Player;
class DumbWalk extends Effect{

        /**
         * @param Player $player
         * @param int    $THCPercentage
         *
         * @TODO: make player NOT walk straight
         */
        public function doEffect(Player $player, $THCPercentage): void{
                $finalPotency = ((($THCPercentage / 1000) + ($this->potency / 100)) * 100);//FOR EFFECT AMPLIFIERS
        }
}