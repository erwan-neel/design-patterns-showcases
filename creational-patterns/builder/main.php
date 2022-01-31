<?php

class Pizza {

    private string $pate;
    private string $sauce;
    private bool $withOlives = false;
    private bool $withCheese = false;
    private bool $withHam = false;

    /**
     * @return string
     */
    public function getPate(): string
    {
        return $this->pate;
    }

    /**
     * @param string $pate
     */
    public function setPate(string $pate): void
    {
        $this->pate = $pate;
    }

    /**
     * @return string
     */
    public function getSauce(): string
    {
        return $this->sauce;
    }

    /**
     * @param string $sauce
     */
    public function setSauce(string $sauce): void
    {
        $this->sauce = $sauce;
    }

    /**
     * @return bool
     */
    public function isWithOlives(): bool
    {
        return $this->withOlives;
    }

    /**
     * @param bool $withOlives
     */
    public function setWithOlives(): void
    {
        $this->withOlives = true;
    }

    /**
     * @return bool
     */
    public function isWithCheese(): bool
    {
        return $this->withCheese;
    }

    /**
     * @param bool $withCheese
     */
    public function setWithCheese(): void
    {
        $this->withCheese = true;
    }

    /**
     * @return bool
     */
    public function isWithHam(): bool
    {
        return $this->withHam;
    }

    /**
     * @param bool $withHam
     */
    public function setWithHam(): void
    {
        $this->withHam = true;
    }

    public function __toString(): string
    {
        return <<<EOD
        Pate: $this->pate
        Sauce: $this->sauce
        Olives: $this->withOlives
        Fromage: $this->withCheese
        Jambon: $this->withHam
        EOD;
    }
}

class PizzaBuilder {

    private Pizza $pizza;

    protected function reset() {
        $this->pizza = new Pizza();
    }

    public function setPate(string $pate) {
        $this->reset();
        $this->pizza->setPate($pate);
    }

    public function setSauce(string $sauce) {
        $this->pizza->setSauce($sauce);
    }

    public function addOlives() {
        $this->pizza->setWithOlives();
    }

    public function addCheese() {
        $this->pizza->setWithCheese();
    }

    public function addHam() {
        $this->pizza->setWithHam();
    }

    public function build(): Pizza {
        return $this->pizza;
    }
}

class PizzaDirector {

    private PizzaBuilder $builder;

    public function __construct(PizzaBuilder $pizzaBuilder) {
        $this->builder = $pizzaBuilder;
    }

    public function makeMargarita() {
        $this->builder->setPate("pate fine");
        $this->builder->setSauce("sauce tomate");
        $this->builder->addCheese();
    }

    public function makeCannibalMargarita() {
        $this->makeMargarita();
        $this->builder->addHam();
    }
}

$pizzaBuilder = new PizzaBuilder();
$pizzaDirector = new PizzaDirector($pizzaBuilder);
$pizzaDirector->makeMargarita();
$margarita = $pizzaBuilder->build();

$pizzaDirector->makeCannibalMargarita();
$cannibalMargarita = $pizzaBuilder->build();

echo "Je voudrais une pizza Margarita :\n";
echo $margarita;

echo "\n\n";

echo "Je voudrais une pizza Margarita avec du jambon :\n";
echo $cannibalMargarita;
