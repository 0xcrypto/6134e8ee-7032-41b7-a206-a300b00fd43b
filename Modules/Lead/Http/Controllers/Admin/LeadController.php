<?php

namespace Modules\Lead\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Lead\Entities\Lead;
use Modules\Setting\Entities\LeadStatus;
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
        $currentUser = auth()->user();
        $stores = $currentUser->stores->map(function ($store){
            return array('name'=> $store->name, 'id'=> $store->id);
        })->toArray();

        $leads = array();
        foreach($stores as $store){
            $storeName = str_replace(" ", "_", $store['name']);
            $storeLeads = Lead::where('store_id', '=', $store['id'])->get();
            $leads[$storeName] = $storeLeads;
            $leads[$storeName."_count"] = $storeLeads->count();
        }

        $onlineLeads = Lead::where('store_id', '=', NULL)->where('source', '=', 1)->get();
        $leads["online"] =  $onlineLeads;
        $leads["online_count"] =  $onlineLeads->count();

        $leadStatuses = LeadStatus::all();

        return view("{$this->viewPath}.index", compact(['stores', 'leads', 'leadStatuses']));


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
