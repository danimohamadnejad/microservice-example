<?php
namespace Soa\User\Traits;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
trait ControllerTrait {
    use AuthorizesRequests, ValidatesRequests;
}