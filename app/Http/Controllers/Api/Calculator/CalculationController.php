<?php

namespace App\Http\Controllers\Api\Calculator;

use App\Http\Requests\Calculator\CalculationRequest;

class CalculationController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function calculation(CalculationRequest $request) {

        $data = $request->all();

        $operand_1 = $data['operand_1'];
        $operand_2 = $data['operand_2'];
        $operator = $data['operator'];

        $result = null;

        try {
            if ($operator == '+') {
                $result = $operand_1 + $operand_2;
            } else if ($operator == '-') {
                $result = $operand_1 - $operand_2;
            } else if ($operator == '*') {
                $result = $operand_1 * $operand_2;
            } else if ($operator == '/') {
                $result = $operand_1 / $operand_2;
            }

            return response()->json([
                'result' => $result,
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'result' => $result,
                'errors' => [
                    ['message' => 'Can not divide by zero']
                ]
            ], 400);
        }
    }
}
