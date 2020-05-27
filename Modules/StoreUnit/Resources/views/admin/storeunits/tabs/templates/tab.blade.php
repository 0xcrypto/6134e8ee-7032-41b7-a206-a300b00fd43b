<div class="accordion-content clearfix">
    <div class="col-lg-3 col-md-4">
        <div class="accordion-box">
            <div class="panel-group" id="AttributeTabs">
            <div class="panel panel-default">
			<div class="panel-heading">
			    <h4 class="panel-title">
			        <a>
			            {{ trans('store::stores.store') }}

			        </a>
			    </h4>
			</div>

        <div id="attribute_set_information" class="panel-collapse collapse in">
            <div class="panel-body">
                <ul class="accordion-tab nav nav-tabs">
                    
                    <li class='active '>
		            <a href='#general' data-toggle='tab'>
                        {{ trans('store::stores.createstore.addstore') }}
                    </a>
		        	</li>
                    
                    <li class=''>
		            <a href='#values' data-toggle='tab'>
                        {{ trans('store::stores.unitstore.storeunit') }}
                    </a>
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
                
                <div class='tab-pane fade in active' id='general'><h3 class='tab-content-title'>
                {{ trans('store::stores.createstore.addstore') }}</h3><div class="row">
            <div class="col-md-8">
                @include('store::admin.stores.tabs.form.addstore')
            </div>
        </div>


    </div><div class='tab-pane fade in ' id='values'><h3 class='tab-content-title'>{{ trans('store::stores.unitstore.storeunit') }}</h3><div id="attribute-values-wrapper">
    <div class="table-responsive">
        <div class="col-md-8">

            </div>
    </div>
</div>



