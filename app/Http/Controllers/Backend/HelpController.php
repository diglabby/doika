<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Utils\RequestSearchQuery;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
//use App\Repositories\Contracts\RoleRepository;
use App\Repositories\Contracts\UserRepository;

class HelpController extends BackendController
{
    /**
     * @var PaymentRepository
     */
    protected $payments;

    /**
     * Create a new controller instance.
     *
     * @param PaymentRepository                             $payments
     */
    public function __construct(UserRepository $payments)
    {
        $this->payments = $payments;
    }

    public function getActivePaymentCounter()
    {
        //return $this->payments->query()->whereActive(true)->count();
        return 1;
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     *
     * @throws \Exception
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function search(Request $request)
    {
        var_dump($request);
        $requestSearchQuery = new RequestSearchQuery($request, $this->users->query(), [
            'name',
            'email',
        ]);

        if ($request->get('exportData')) {
            return $requestSearchQuery->export([
                'name',
                'email',
                'active',
                'last_access_at',
                'created_at',
                'updated_at',
            ],
                [
                    __('validation.attributes.name'),
                    __('validation.attributes.email'),
                    __('validation.attributes.active'),
                    __('labels.last_access_at'),
                    __('labels.created_at'),
                    __('labels.updated_at'),
                ],
                'payments');
        }

        // return $requestSearchQuery->result([
        //     'id',
        //     'name',
        //     'email',
        //     'active',
        //     'last_access_at',
        //     'created_at',
        //     'updated_at',
        // ]);
        return "";
    }

    /**
     * @param Payment $payment
     *
     * @return Payment
     */
    public function show(Payment $payment)
    {
        if (! $payment->can_edit) {
            // Only Super admin can access himself
            abort(403);
        }

        return $payment;
    }

    /**
     * @param StorePaymentRequest $request
     *
     * @return mixed
     */
    public function store(StorePaymentRequest $request)
    {
        $this->authorize('create payments');

        $this->payments->store($request->input());

        return $this->redirectResponse($request, __('alerts.backend.payments.created'));
    }

    /**
     * @param Payment              $payment
     * @param UpdatePaymentRequest $request
     *
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     *
     * @return mixed
     */
    public function update(Payment $payment, UpdatePaymentRequest $request)
    {
        $this->authorize('edit payments');

        $this->payments->update($payment, $request->input());

        return $this->redirectResponse($request, __('alerts.backend.payments.updated'));
    }

    /**
     * @param Payment    $payment
     * @param Request $request
     *
     * @return mixed
     */
    public function destroy(Payment $payment, Request $request)
    {
        $this->authorize('delete payments');

        $this->payments->destroy($payment);

        return $this->redirectResponse($request, __('alerts.backend.payments.deleted'));
    }

    /**
     * @param Payment $payment
     *
     * @return mixed
     */
    public function impersonate(Payment $payment)
    {
        $this->authorize('impersonate payments');

        return $this->payments->impersonate($payment);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function batchAction(Request $request)
    {
        $action = $request->get('action');
        $ids = $request->get('ids');

        switch ($action) {
            case 'destroy':
                $this->authorize('delete payments');

                $this->payments->batchDestroy($ids);

                return $this->redirectResponse($request, __('alerts.backend.payments.bulk_destroyed'));
                break;
            case 'enable':
                $this->authorize('edit payments');

                $this->payments->batchEnable($ids);

                return $this->redirectResponse($request, __('alerts.backend.payments.bulk_enabled'));
                break;
            case 'disable':
                $this->authorize('edit payments');

                $this->payments->batchDisable($ids);

                return $this->redirectResponse($request, __('alerts.backend.payments.bulk_disabled'));
                break;
        }

        return $this->redirectResponse($request, __('alerts.backend.actions.invalid'), 'error');
    }

    public function activeToggle(Payment $payment)
    {
        $this->authorize('edit payments');
        $payment->update(['active' => ! $payment->active]);
    }
}
