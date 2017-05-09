<?php
namespace Bud\Bong;
use pocketmine\level\particle\SmokeParticle;
use pocketmine\Player;
class Pipe extends Bong{
        /**
         * WaterBottle constructor.
         *
         * @param int    $count
         */
        public function __construct($count = 1){
                parent::__construct(self::BOWL, 1, $count, 'Pipe (bong)');
        }

        /**
         * @return string
         */
        public function getMaterial(): string{
                return "Wood|Plastic|Metal";
        }

        /**
         * @return string
         */
        public function getBongName(): string{
                return "Pipe (Bong)";
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
                        $effect->setPotency(6);
                }
                $this->strain->doEffects($player);
                unset($this->strain);
        }
}