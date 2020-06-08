<?php

namespace Modules\Lead\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Lead\Entities\Lead;
use Modules\Store\Entities\Store;
use Modules\Setting\Entities\Setting;
use Modules\User\Entities\User;
use Modules\User\Entities\RoleTranslation;
use Modules\User\Entities\Role;
use Modules\Lead\Http\Requests\SaveLeadRequest;
use Illuminate\Support\Facades\Auth;


class LeadController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $userStores = \DB::table('user_stores')->where('user_id', $userId)->pluck('user_id', 'store_id')->toArray();
        $storeLists = Store::all();
        $indexCount = \DB::table('lead_statuses')->pluck('name', 'id');
        $leadsData = Lead::where('lead_status_id', $indexCount)->get();    
        return view("{$this->viewPath}.index",[
            'storeLists' => $storeLists,
        ]);
    }

    public function create()
    {
        $listStatusArray = ['' => 'select Status'];
        $leadStatusList = \DB::table('lead_statuses')->pluck('name', 'id')->toArray();
        $leadStatusList = array_combine(array_merge([''], array_keys($leadStatusList)), array_merge(['select Status'], array_values($leadStatusList)));

        $customerList = Role::find(Role::list()->search('Customer'))->users->pluck('first_name', 'id')->toArray();
        $customerList = array_combine(array_merge([''], array_keys($customerList)), array_merge(['select Customer'], array_values($customerList)));

        $storeLists = Store::all()->pluck('name', 'id')->toArray();
        $storeLists = array_combine(array_merge([''], array_keys($storeLists)), array_merge(['select Store'], array_values($storeLists)));

        return view("{$this->viewPath}.create",[
            'leadStatusList' => $leadStatusList,
            'customerList' => $customerList,
            'storeLists' => $storeLists,
        ]);
    }

    public function store(Request $request)
    {
        $lead = new Lead();
        $lead->customer_id = $request->customer_id;
        $lead->lead_status_id = $request->lead_status_id;
        $lead->store_id = $request->store_id;
        $lead->description = $request->description;
        $lead->created_by = Auth()->id();
        $lead->save();

        return redirect()->route("admin.leads.index")
        ->withSuccess(trans('admin::messages.resource_saved', ['resource' => 'Lead']));
    }

    public function delete()
    {
        dd('delete');
    }

    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Lead::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'lead::leads.lead';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'lead::admin.leads';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SaveLeadRequest::class;
}
