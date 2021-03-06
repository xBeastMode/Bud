<?php
namespace Bud\Rollup;
use pocketmine\level\particle\SmokeParticle;
use pocketmine\Player;
class Joint extends Rollup{
        /**
         * WaterBottle constructor.
         *
         * @param int    $count
         */
        public function __construct($count = 1){
                parent::__construct(self::BONE, 1, $count, 'Joint (rollup)');
        }

        /**
         * @return string
         */
        public function getMaterial(): string{
                return "Paper";
        }

        /**
         * @return string
         */
        public function getRollupName(): string{
                return "Joint (Rollup)";
        }

        /**
         * @TODO: spawn smoke animation
         *
         * @param Player $player
         */
        public function smoke(Player $player){
                if($this->strain == Null){
                        $this->getStrain();
                }
                for($i = 0; $i <= 5; $i += 0.5){
                        $player->level->addParticle(new SmokeParticle($player->floor()->add(0, $player->getEyeHeight(), -2)
                            ->add(
                                ($player->width / 2 + mt_rand(-100, 100) / 500),
                                ($player->width / 2 + mt_rand(-100, 100) / 500),
                                ($player->width / 2 + mt_rand(-100, 100) / 500))));
                }
                foreach($this->strain->getEffects() as $effect){
                        $effect->setPotency(4);
                }
                $this->strain->doEffects($player);
                unset($this->strain);
        }
}