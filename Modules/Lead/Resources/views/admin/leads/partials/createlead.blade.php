<div class="accordion-content clearfix">
    <div class="col-lg-3 col-md-4">
        <div class="accordion-box">
            <div class="panel-group" id="StoreTabs">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a>
                                {{ trans('lead::leads.lead_information') }}
                            </a>
                        </h4>
                    </div>
                    <div id="store_information" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="accordion-tab nav nav-tabs">
                                <li class='active '>
                                    <a href='#Add Store Unit' data-toggle='tab'>{{ trans('lead::leads.add_lead') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-8">
        <div class="accordion-box-content">
            <div class="tab-content clearfix">
                    <div class='tab-pane fade in active' id='Add Store Unit'><h3 class='tab-content-title'>{{ trans('lead::leads.add_lead') }}</h3><div class="row">
                        <div class="col-md-12">

                            {{ Form::select('customer_id', trans('lead::attributes.form.customer'), $errors, $customerList, ['required' => true]) }}
                            {{ Form::select('lead_status_id', trans('lead::attributes.form.lead'), $errors, $leadStatusList, ['required' => true]) }}
                            {{ Form::select('store_id', trans('lead::attributes.form.store'), $errors, $storeLists, ['required' => true]) }}
                            {{ Form::textarea('description', trans('lead::attributes.form.description'), $errors,  ['required' => true]) }}

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <button type="submit" class="btn btn-primary" data-loading>
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>