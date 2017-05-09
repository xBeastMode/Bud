<?php
namespace Bud\SideEffects;
use pocketmine\Player;
class Hunger extends Effect{

        /**
         * @param Player $player
         * @param int    $THCPercentage
         *
         * @TODO: make player hunger go down fast but not make him die
         */
        public function doEffect(Player $player, $THCPercentage): void{
                $finalPotency = ((($THCPercentage / 1000) + ($this->potency / 100)) * 100);//FOR EFFECT AMPLIFIERS
        }
}