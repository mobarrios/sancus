{{Form::texto('name', 		Lang::get('doctor.name'))}}
{{Form::texto('last_name', 	Lang::get('doctor.lastName'))}}
{{Form::texto('dni', 		Lang::get('doctor.document'))}}
{{Form::texto('email', 		Lang::get('doctor.email'))}}
{{Form::texto('phone', 		Lang::get('doctor.phoneNumber'))}}
{{Form::texto('address', 	Lang::get('doctor.address'))}}
{{Form::texto('cell_phone', Lang::get('doctor.cellPhoneNumber'))}}
{{Form::texto('national_license',	Lang::get('doctor.nationalLicense'))}}
{{Form::texto('provincial_license',	Lang::get('doctor.provincialLicense'))}}
<br/>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	<div class="panel panel-default">
	  <div class="panel-heading" role="tab" id="headingTwo">
	    <h4 class="panel-title">
	      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#2" aria-expanded="false" aria-controls="collapseTwo">
	      {{ Lang::get("doctor.medicalinsurances") }}
	      </a>
	    </h4>
	  </div>
	  <div id="2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
	    <div class="panel-body">    
	       {{ Form::medicalinsurances() }}    
	    </div>
	  </div>
	</div>
</div>