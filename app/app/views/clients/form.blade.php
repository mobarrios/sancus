{{Form::texto('name', 		Lang::get('client.name'))}}
{{Form::texto('last_name', 	Lang::get('client.lastName'))}}
{{Form::texto('dni', 		Lang::get('client.document'))}}
{{Form::texto('address', 	Lang::get('client.address'))}}
{{Form::texto('email', 		Lang::get('client.email'))}}
{{Form::texto('phone', 		Lang::get('client.phoneNumber'))}}
{{Form::texto('cell_phone', Lang::get('client.cellPhoneNumber'))}}
{{Form::texto('company_name', 	Lang::get('client.company'))}}
{{Form::texto('cuit', 			Lang::get('client.cuit'))}}
{{Form::medicalinsurance('medicalinsurance_id', Lang::get("client.medicalInsurance"), 'medicalinsurance_id')}}
{{Form::medicalinsuranceplan('medicalinsuranceplan_id', Lang::get("client.medicalInsurancePlan"), 'medicalinsuranceplan_id', 1)}}

<script type="text/javascript">
			
		$('document').ready(function(){

			$('#medicalinsurance_id').on('change',function()
			{
				$.ajax({
					type: "POST",
					url: '{{Config::get("constants.MEDICALINSURANCEPLAN_BYMEDICALINSURANCE_SEARCH_PATH_METHOD_POST")}}',
					data:  {search : this.value },
					dataType: "json",
						success: function(data){
							var select  = document.getElementById("medicalinsuranceplan_id");
							removeOptions(select);
							for(var i = 0; i < data.length; i++) {
							    var opt 	= data[i];
							    var el 		= document.createElement("option");
							    el.text 	= opt['text'];
							    el.value 	= opt['id'];
							    select.appendChild(el);
							}
					}                            
				});
			});

		});

		function removeOptions(selectbox)
		{
		    var i;
		    for(i=selectbox.options.length-1;i>=0;i--)
		    {
		        selectbox.remove(i);
		    }
		}

</script>