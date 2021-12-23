<?php

namespace Tests\Feature;

use Tests\TestCase;

class EmployeesListTest extends TestCase
{
    /**
     * @var string
     */
    private $route;

    /**
     * @throws \Exception
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->route = route('employees.index');
    }

    private function request(): \Illuminate\Testing\TestResponse
    {
        $data = [];
        return $this->json('GET', $this->route, $data);
    }

    public function testShouldReturnCorrectJsonPartStructure(): void
    {
        $response = $this->request();

        $response->assertOk()
            ->assertJsonStructure(
                [
                    'employees' => [
                        'current_page',
                        'data' => [
                            '*' => [
                                'id',
                                'address_id',
                                'first_name',
                                'last_name',
                                'email',
                                'cpf',
                                'rg',
                                'birthday',
                                'created_at',
                                'updated_at',
                                'deleted_at',
                            ]
                        ]
                    ]
                ]
            )->assertJsonFragment(
                [
                    'id' => 11,
                    'address_id' => 31,
                    'first_name' => 'Mirella',
                    'last_name' => 'Zaragoça',
                    'email' => 'cdeverso@example.net',
                    'cpf' => '75513417499',
                    'rg' => '731564790',
                    'birthday' => '1999-03-01',
                    'created_at' => '2021-12-23T17:53:17.000000Z',
                    'updated_at' => '2021-12-23T17:53:17.000000Z',
                    'deleted_at' => null,
                ]
            );
    }

}
