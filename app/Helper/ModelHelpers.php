<?php

namespace App\Helper;

trait ModelHelpers
{
    public static function findAllPaginated($perPage = 20)
    {
        return static::latest()->paginate($perPage);
    }

    public static function findById($id)
    {
        return static::findOrFail($id);
    }

    public static function getFilteredPaginated($request, $per_page)
    {
        return static::filter($request)->paginate($per_page);
    }

    public static function getFilteredLatestPaginated($request, $per_page)
    {
        return static::filter($request)->latest()->paginate($per_page);
    }

    public static function getFilteredRoleLatestPaginated($request, $per_page)
    {
        return static::filter($request)->getByRole($request)->latest()->paginate($per_page);
    }

    public static function getOrderedPaginated($order_by, $per_page)
    {
        return static::orderBy($order_by)->paginate($per_page);
    }

    public static function getFilteredOrderedPaginated($request, $per_page, $order_by, $order)
    {
        return static::filter($request)->orderBy($order_by, $order)->paginate($per_page);
    }

    public static function getRoleFilerLatestPaginated($request, $per_page)
    {
        return static::getByRole($request)->filter($request)->latest()->paginate($per_page);
    }
}
