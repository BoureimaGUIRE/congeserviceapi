<?php

namespace Database\Factories;


use App\Models\Conge;
use Illuminate\Database\Eloquent\Factories\Factory;

class CongeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Conge::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $typeConge = array('ANNUEL', 'MATERNITE', 'REPOS MALADIE');
        $periode = array('2022', '2021', '2020');
        return [
            'typeConge' => $typeConge[array_rand($typeConge, 1)],
            'dateDebut' => $this->faker->date('Y-m-d'),
            'dateFin' => $this->faker->dateTimeBetween('Y-m-d', '+1 month'),
            'periode' => $periode[array_rand($periode, 1)],
            'employe_id' => rand(1, 10),
            'contrat_id' => rand(1, 10)
        ];
    }
}
