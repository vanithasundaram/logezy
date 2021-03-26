1.is-business-day [POST] input format with give payload below for API-1.
2.get-business-days [POST] input from with payload below for API-2.
API -1 Payload:
{
	'date' : 'dd-mm-yyyy'
} 
Response:
{
	'status_code': 200,
	'data': {
		'is_business_day' : true
   }
}
API -2 Payload:
{
	'start_date' : 'dd-mm-yyyy',
	'end_date' : 'dd-mm-yyyy'
} 
Response:
{
	'status_code': 200,
	'data': {
		'days' : [
    		# List of all business days between given `start_date` and `end_date`
		]
   }
}