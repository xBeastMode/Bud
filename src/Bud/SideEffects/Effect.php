<?php
namespace Bud\SideEffects;
use pocketmine\Player;
abstract class Effect{
        /** @var string */
        protected $name;
        /** @var int */
        protected $potency;

        /**
         * Effect constructor.
         *
         * @param $name
         * @param $potency
         */
        public function __construct($name, $potency){
                $this->name = $name;
                $this->potency = $potency;
        }

        /**
         * @return int
         */
        public function getEffectName() : int{
                return $this->name;
        }

        public function putPotency(int $potency){
                $this->potency += $potency;
        }

        /**
         * @param int $potency
         */
        public function setPotency(int $potency){
                $this->potency = $potency;
        }

        /**
         * @return int
         */
        public function getPotency() : int{
                return $this->potency;
        }

        /**
         * @param Player $player
         * @param $THCPercentage
         */
        public abstract function doEffect(Player $player, $THCPercentage) : void;
}