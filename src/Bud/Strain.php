<?php
namespace Bud;
use Bud\SideEffects\Effect;
use Bud\Task\KickInTask;
use pocketmine\Player;
class Strain{
        /** @var Bud */
        protected $plugin;
        /** @var string */
        protected $name;
        /** @var int */
        protected $grams, $THCPercentage;
        /** @var Effect[] */
        protected $effects = [];

        /**
         * Strain constructor.
         *
         * @param Bud      $plugin
         * @param string   $name
         * @param int      $grams
         * @param int      $THCPercentage
         * @param Effect[] $effects
         */
        public function __construct(Bud $plugin, $name, $grams = 1, $THCPercentage = 25, $effects = []){
                if($THCPercentage <= 0 or $grams <= 0){
                        $grams = 1;
                        $THCPercentage = 25;
                }
                $this->plugin = $plugin;
                $this->name = $name;
                $this->grams = $grams;
                $this->THCPercentage = $THCPercentage;
                $this->effects = $effects;
        }

        /**
         * @return string
         */
        public function getName(){
                return $this->name;
        }

        /**
         * @param int $grams
         */
        public function setGrams(int $grams){
                $this->grams = $grams;
        }

        /**
         * @param int $grams
         */
        public function putGrams(int $grams){
                $this->grams += $grams;
        }

        /**
         * @return int
         */
        public function getGrams(){
                return $this->grams;
        }

        /**
         * @param int $percentage
         */
        public function setTHCPercentage(int $percentage){
                $this->THCPercentage = $percentage;
        }

        /**
         * @param int $percentage
         */
        public function putTHCPercentage(int $percentage){
                $this->THCPercentage += $percentage;
        }

        /**
         * @return int
         */
        public function getTHCPercentage(){
                return $this->THCPercentage;
        }

        /**
         * @return Effect[]
         */
        public function getEffects(){
                return $this->effects;
        }

        /**
         * @param Effect $effect
         */
        public function putEffect(Effect $effect){
                $this->effects[$effect->getEffectName()] = $effect;
        }

        /**
         * @param Player $player
         */
        public function doEffects(Player $player){
                $this->plugin->getServer()->getScheduler()->scheduleDelayedRepeatingTask(new KickInTask($this->plugin, $player, $this->effects, $this->THCPercentage), 15, ((20*60)*20));
        }
}