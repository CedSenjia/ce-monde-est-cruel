<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class TibrinPlayers
 * @package Hackathon\PlayerIA
 * @author Cedric BAUDOIN
 * stratégie: Je suis parti du raisonnement logique humain... Puis j'ai changer l'ajustement parce que les humains de la classe sont étranges.
 * Du coup, je commence toujours par feuille. Ensuite mon coup s'adapte en fonction du resultat du "clash" precedent et de ce que l'adversaire à joué.
 */
class TibrinPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        if ($this->result->getNbRound() < 2)
        {
            return parent::paperChoice();
        }
        else{
            if ($this->result->getLastScoreFor($this->mySide) == 3)
            {
                if ($this->result->getLastChoiceFor($this->opponentSide) == "scissors")
                    return parent::scissorsChoice();
                if ($this->result->getLastChoiceFor($this->opponentSide) == "paper")
                    return parent::paperChoice();
                if ($this->result->getLastChoiceFor($this->opponentSide) == "rock")
                    return parent::rockChoice();
                return parent::rockChoice();
                }
            if ($this->result->getLastScoreFor($this->mySide) == 1)
            {
                if ($this->result->getLastChoiceFor($this->opponentSide) == "scissors")
                    return parent::rockChoice();
                if ($this->result->getLastChoiceFor($this->opponentSide) == "paper")
                    return parent::scissorsChoice();
                if ($this->result->getLastChoiceFor($this->opponentSide) == "rock")
                    return parent::paperChoice();
                return parent::paperChoice();
            }
            else
            {
                if ($this->result->getLastChoiceFor($this->mySide) == "scissors")
                    return parent::paperChoice();
                if ($this->result->getLastChoiceFor($this->mySide) == "paper")
                    return parent::scissorsChoice();
                if ($this->result->getLastChoiceFor($this->mySide) == "rock")
                    return parent::rockChoice();
                return parent::scissorsChoice();
            }
            return parent::paperChoice();
        }
        return parent::scissorsChoice();

    }
};
