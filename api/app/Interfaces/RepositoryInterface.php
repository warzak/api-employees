<?php

namespace App\Interfaces;

interface RepositoryInterface
{
    public function all();

    public function byId($id);

    public function byCpf($cpf);

    public function bindSalary(array $data);

    public function create(array $details);

    public function update($id, array $details);

    public function delete($id);
}
