<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Utils\RequestSearchQuery;
use App\Http\Requests\StoreCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
//use App\Repositories\Contracts\RoleRepository;
use App\Repositories\Contracts\UserRepository;

class CampaignController extends BackendController
{
    /**
     * @var CampaignRepository
     */
    protected $campaigns;

    /**
     * Create a new controller instance.
     *
     * @param CampaignRepository                             $campaigns
     */
    public function __construct(UserRepository $campaigns)
    {
        $this->campaigns = $campaigns;
    }

    public function getActiveCampaignCounter()
    {
        //return $this->campaigns->query()->whereActive(true)->count();
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
                'campaigns');
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
     * @param Campaign $campaign
     *
     * @return Campaign
     */
    public function show(Campaign $campaign)
    {
        if (! $campaign->can_edit) {
            // Only Super admin can access himself
            abort(403);
        }

        return $campaign;
    }

    /**
     * @param StoreCampaignRequest $request
     *
     * @return mixed
     */
    public function store(StoreCampaignRequest $request)
    {
        $this->authorize('create campaigns');

        $this->campaigns->store($request->input());

        return $this->redirectResponse($request, __('alerts.backend.campaigns.created'));
    }

    /**
     * @param Campaign              $campaign
     * @param UpdateCampaignRequest $request
     *
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     *
     * @return mixed
     */
    public function update(Campaign $campaign, UpdateCampaignRequest $request)
    {
        $this->authorize('edit campaigns');

        $this->campaigns->update($campaign, $request->input());

        return $this->redirectResponse($request, __('alerts.backend.campaigns.updated'));
    }

    /**
     * @param Campaign    $campaign
     * @param Request $request
     *
     * @return mixed
     */
    public function destroy(Campaign $campaign, Request $request)
    {
        $this->authorize('delete campaigns');

        $this->campaigns->destroy($campaign);

        return $this->redirectResponse($request, __('alerts.backend.campaigns.deleted'));
    }

    /**
     * @param Campaign $campaign
     *
     * @return mixed
     */
    public function impersonate(Campaign $campaign)
    {
        $this->authorize('impersonate campaigns');

        return $this->campaigns->impersonate($campaign);
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
                $this->authorize('delete campaigns');

                $this->campaigns->batchDestroy($ids);

                return $this->redirectResponse($request, __('alerts.backend.campaigns.bulk_destroyed'));
                break;
            case 'enable':
                $this->authorize('edit campaigns');

                $this->campaigns->batchEnable($ids);

                return $this->redirectResponse($request, __('alerts.backend.campaigns.bulk_enabled'));
                break;
            case 'disable':
                $this->authorize('edit campaigns');

                $this->campaigns->batchDisable($ids);

                return $this->redirectResponse($request, __('alerts.backend.campaigns.bulk_disabled'));
                break;
        }

        return $this->redirectResponse($request, __('alerts.backend.actions.invalid'), 'error');
    }

    public function activeToggle(Campaign $campaign)
    {
        $this->authorize('edit campaigns');
        $campaign->update(['active' => ! $campaign->active]);
    }
}
