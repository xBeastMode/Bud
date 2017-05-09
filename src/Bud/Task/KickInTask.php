<?php
namespace Bud\Task;
use Bud\Bud;
use Bud\SideEffects\Effect;
use pocketmine\Player;
use pocketmine\scheduler\PluginTask;
class KickInTask extends PluginTask{
        /** @var Player */
        protected $player;
        /** @var Effect[] */
        protected $effects = [];
        /** @var int */
        protected $THCPercentage;

        /**
         * KickInTask constructor.
         *
         * @param Bud      $owner
         * @param Player   $p
         * @param Effect[] $effects
         * @param int      $THCPercentage
         */
        public function __construct(Bud $owner, Player $p, $effects, $THCPercentage){
                parent::__construct($owner);
                $this->player = $p;
                $this->effects = $effects;
                $this->THCPercentage = $THCPercentage;
        }

        /**
         * Actions to execute when run
         *
         * @param $currentTick
         *
         * @return void
         */
        public function onRun($currentTick){
                foreach($this->effects as $effect){
                        $effect->doEffect($this->player, $this->THCPercentage);
                }
        }
}