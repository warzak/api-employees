<?php

namespace App\Http\Controllers;

use App\Interfaces\RepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class EmployeeController extends Controller
{
    /**
     * @var RepositoryInterface
     */
    private $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $employees = $this->repository->all();
        return response(
            [
            'employees' => $employees,
            'message' => 'Retrieved successfully'
            ], ResponseAlias::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        return $this->createOrUpdate($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return Response
     */
    public function show($id): Response
    {
        if ($employee = $this->repository->byId($id)) {
            $address = $employee->address->street . ' CEP ' . $employee->address->postal_code . ' - ' . $employee->address->city->name . ' / ' . $employee->address->city->state->code;
            $salaries = $employee->salaries->map(
                function ($row) {
                    return \Carbon\Carbon::parse($row['created_at'])->toDateString() . ' - R$' . $row['value'];
                }
            );

            $data = [
                'id' => $employee->id,
                'first_name' => $employee->first_name,
                'last_name' => $employee->last_name,
                'email' => $employee->email,
                'cpf' => $employee->cpf,
                'rg' => $employee->rg,
                'birthday' => $employee->birthday,
                'address' => $address,
                'salaries' => $salaries
            ];

            return response(
                [
                'employee' => $data,
                'message' => "Record found"
                ], ResponseAlias::HTTP_OK
            );
        }

        return response([], ResponseAlias::HTTP_NO_CONTENT);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  $id
     * @return Response
     */
    public function update(Request $request, $id): Response
    {
        $request['id'] = $id;
        return $this->createOrUpdate($request, true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        $this->repository->delete($id);
        return response([], ResponseAlias::HTTP_NO_CONTENT);
    }

    /**
     * Display the specified resource by cpf number.
     *
     * @param  $cpf
     * @return Response
     */
    public function findByCpf($cpf): Response
    {
        $employee = $this->repository->byCpf($cpf);
        return $this->show($employee['id']);
    }

    /**
     * Store a salary to employee
     *
     * @param  Request $request
     * @return Response
     */
    public function bindSalary(Request $request): Response
    {
        $validatedData = Validator::make(
            $request->all(), [
            'employee_id' => 'required|numeric',
            'salary' => 'required'
            ]
        );

        if ($validatedData->fails()) {
            return response(
                [
                "error" => 'validation_error',
                "message" => $validatedData->errors(),
                ], ResponseAlias::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        if ($this->repository->bindSalary($request->all())) {
            return response(
                [
                'message' => 'Registered successfully'
                ], ResponseAlias::HTTP_OK
            );
        }

        return response([], ResponseAlias::HTTP_NO_CONTENT);

    }


    /**
     * @param  Request $request
     * @return Application|ResponseFactory|Response|mixed
     */
    public function createOrUpdate(Request $request, bool $update = false)
    {
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'cpf' => 'required|numeric|unique:employees',
            'rg' => 'required|numeric|unique:employees',
            'birthday' => 'required|date',
            'address' => 'required',
            'postal_code' => 'required',
            'city_id' => 'required|numeric'
        ];

        if ($update) {
            $rules = [
                'first_name' => 'string|max:255',
                'last_name' => 'string|max:255',
                'email' => 'email|string',
                'cpf' => 'numeric',
                'rg' => 'numeric',
                'birthday' => 'date',
                'city_id' => 'numeric'
            ];
        }

        $validatedData = Validator::make($request->all(), $rules);

        if ($validatedData->fails()) {
            return response(
                [
                "error" => 'validation_error',
                "message" => $validatedData->errors(),
                ], ResponseAlias::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        $employee = $request->only(
            [
            'first_name',
            'last_name',
            'email',
            'cpf',
            'birthday',
            'rg',
            'address',
            'postal_code',
            'city_id'
            ]
        );

        if ($request->get('id')) {
            $this->repository->update($request->get('id'), $employee);
            return response(
                [
                'message' => 'Modified registration'
                ], ResponseAlias::HTTP_OK
            );
        }

        $this->repository->create($employee);
        return response(
            [
            'message' => 'Registered successfully'
            ], ResponseAlias::HTTP_CREATED
        );
    }
}
