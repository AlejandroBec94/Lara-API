<?php
/**
 * Created by PhpStorm.
 * User: Bec
 * Date: 3/21/2019
 * Time: 12:55 PM
 */

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    public function apiException($request, $e)
    {
        if ($this->isModel($e)) {
            return $this->ModelResponse($e);
        }
        if ($this->isHttp($e)) {
            return $this->HttpResponse($e);
        }
        return parent::render($request, $e);
    }

    public function isModel($e)
    {
        return $e instanceof ModelNotFoundException;
    }

    public function isHttp($e)
    {
        return $e instanceof NotFoundHttpException;
    }

    public function ModelResponse($e)
    {
        return response()->json(['error' => 'Product Model Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function HttpResponse($e)
    {
        return response()->json(['error' => 'Incorrect Route'], Response::HTTP_NOT_FOUND);
    }
}
