<?php

interface GrantRequestable
{
    public function applyForGrant(Committee $committee): void;
}

abstract class ResearchProject
{
    public $title;
    public $field;

    public function __construct($title, $field)
    {
        $this->title = $title;
        $this->field = $field;
    }

    abstract public function getRelevanceProject(): int;
}

class Committee
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function approveGrant(ResearchProject $researchProject)
    {
        return 5000 * $researchProject->getRelevanceProject();
    }
}

class SpaceResearch extends ResearchProject implements GrantRequestable
{
    public function getRelevanceProject(): int
    {
        return rand(6, 10);
    }

    public function applyForGrant(Committee $committee): void
    {
        echo "Project {$this->title} {$this->field} was approved by {$committee->name} with \${$committee->approveGrant($this)} \n";
    }
}


class ClimateResearch extends ResearchProject implements GrantRequestable
{
    public function getRelevanceProject(): int
    {
        return rand(3, 7);
    }

    public function applyForGrant(Committee $committee): void 
    {
        echo "Project {$this->title} {$this->field} was approved by {$committee->name} with \${$committee->approveGrant($this)} \n";
    }
}



// $committee1 = new Committee("Crowd");

// $spaceResearch1 = new SpaceResearch("Mars", "Research surface");
// $spaceResearch1->applyForGrant($committee1);

// $climateResearch1 = new ClimateResearch("Stratosphere", "Research probe");

// $climateResearch1->applyForGrant($committee1);

$projectsComs = [

    $spaceResearchs = [
        $spaceResearch1 = new SpaceResearch("Mars", "Research surface"),
        $spaceResearch2 = new SpaceResearch("Venus", "Research atmosphere"),
        $spaceResearch3 = new SpaceResearch("Sun", "Measure the temperature of the atmosphere"),
        $spaceResearch4 = new SpaceResearch("Saturn", "Take a beautiful picture"),

    ],

    $committees = [
        $committee1 = new Committee("Сrowd of greedy people"),
        $committee2 = new Committee("Corruption-Studio"),
        $committee3 = new Committee("Lovers-Money")
    ],
];

foreach($projectsComs[0] as $spaceResearch){
    //echo "{$spaceResearch->title} -";
    $randIndex = rand(0, count($projectsComs[1]) - 1);
    foreach($projectsComs[1] as $index => $committee){        
        if ($index == $randIndex){
            $spaceResearch->applyForGrant($committee);
            //echo " {$committee->name} \n";
        } else {
            continue;
        }
    }
}

//$projectsComs[0][0]->applyForGrant($projectsComs[1][0]);