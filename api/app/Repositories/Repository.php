<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Address;
use App\Models\Employee;
use App\Models\Salaries;
use Illuminate\Database\Eloquent\Collection;

class Repository implements RepositoryInterface
{
    /**
     * @return Employee[]|Collection
     */
    public function all()
    {
        return Employee::paginate();
    }

    public function byId($id)
    {
        if ($employee = Employee::find($id)) {
            return $employee;
        }

        return [];
    }

    public function byCpf($cpf): array
    {
        return Employee::where('cpf', '=', $cpf)->first()->toArray();
    }

    public function create(array $details): bool
    {
        $address = [
            'city_id' => $details['city_id'],
            'street' => $details['address'],
            'postal_code' => $details['postal_code']
        ];

        if($register = Address::create($address)) {
            Employee::create(
                [
                    'address_id' => $register->id,
                    'first_name' => $details['first_name'],
                    'last_name' => $details['last_name'],
                    'email' => $details['email'],
                    'cpf' => $details['cpf'],
                    'rg' => $details['rg'],
                    'birthday' => $details['birthday'],
                ]
            );

            return true;
        }

        return false;
    }

    public function update($id, array $details)
    {
        Address::whereId($id)->update(
            [
                'city_id' => $details['city_id'],
                'street' => $details['address'],
                'postal_code' => $details['postal_code']
            ]
        );

        return Employee::whereId($id)->update(
            [
                'first_name' => $details['first_name'],
                'last_name' => $details['last_name'],
                'email' => $details['email'],
                'cpf' => $details['cpf'],
                'rg' => $details['rg'],
                'birthday' => $details['birthday'],
            ]
        );
    }

    /**
     * @param  $id
     * @return bool
     */
    public function delete($id)
    {
        if ($employee = Employee::find($id)) {
            $employee->delete();
            return true;
        }

        return false;
    }

    public function bindSalary(array $data): bool
    {
        if (Employee::find($data['employee_id'])) {
            Salaries::create(
                [
                'employee_id' => $data['employee_id'],
                'value' => $data['salary']
                ]
            );
            return true;
        }

        return false;
    }
}
