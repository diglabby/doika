<?php

declare(strict_types=1);

namespace Diglabby\Doika\Http\Controllers\Dashboard;

use Diglabby\Doika\Http\Controllers\Controller;
use Diglabby\Doika\Http\Resources\Dashboard\AdminResource;
use Diglabby\Doika\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;

final class AdminController extends Controller
{
    public function index(): \JsonSerializable
    {
        $query = Admin::query();

        return AdminResource::collection(
            QueryBuilder::for($query)->paginate()
        );
    }

    public function show(Admin $admin): \JsonSerializable
    {
        return new AdminResource($admin);
    }

    public function update(Admin $admin, Request $request): \JsonSerializable
    {
        $this->validate($request, [
            'name'   => ['required', 'string', 'min:2'],
            'email'  => ['required', 'email'],
            'locale' => ['required'],
        ]);

        $admin->update($request->all(['name', 'email', 'locale']));

        return new AdminResource($admin);
    }

    public function delete(Admin $admin): \JsonSerializable
    {
        if (Admin::query()->count() === 1) {
            return response(['error' => 'Can not delete the only one admin'], Response::HTTP_CONFLICT);
        }

        $admin->delete();

        return response('', Response::HTTP_NO_CONTENT);
    }
}
