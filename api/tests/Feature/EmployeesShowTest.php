<?php

namespace Tests\Feature;

use DB;
use Tests\TestCase;

class EmployeesShowTest extends TestCase
{
    /**
     * @var string
     */
    private $route;

    private $id = 50;

    /**
     * @throws \Exception
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->route = route('employees.show', $this->id);
    }

    private function request(): \Illuminate\Testing\TestResponse
    {
        $data = [];
        return $this->json('GET', $this->route, $data);
    }

    public function testShowNoContent(): void
    {
        $response = $this->json('GET', route('employees.show', -999), []);
        $response->assertNoContent();
    }

    public function testShouldReturnCorrectJsonPartStructure(): void
    {
        $response = $this->request();

        $response->assertOk()
            ->assertJsonStructure(
                [
                    'employee' => [
                        'id',
                        'first_name',
                        'last_name',
                        'email',
                        'cpf',
                        'rg',
                        'birthday',
                        'address',
                        'salaries' => [],
                    ]
                ]
            )->assertJsonFragment(
                [
                    'id' => 50,
                ]
            );
    }

}
