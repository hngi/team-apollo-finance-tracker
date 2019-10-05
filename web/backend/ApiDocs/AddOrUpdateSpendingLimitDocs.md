# Backend  API Documentation

if <code>error  </code> value is 1 that means error occur and the error message can be gotten using the errorMessage index

else if its 0 that means no error occured and operation is successfull so the success message can be 
gotten from successMessage


## link_to_route/route.php/dashboard/addspendinglimit POST Request
<br>

#### POST VARIABLE : limit


###### Onsuccessfull Addition

...
```json
{
  "error": 0,
  "successMessage": "Spending Limit Changed Successfully",
  "report": "spendingLimitChanged"
}
```
...

###### Empty Post variable

...
```json
{
  "error": 1,
  "errorMessage": "No Data Received by the backend",
  "report": "noDataReceived"
}
```
...

###### UNknown Error /DB error

...
```json
{
  "error": 1,
  "errorMessage": "Unknown Database Error",
  "report": "unknownError"
}
```
...


###### User Not Login

...
```json
{
  "error": 1,
  "errorMessage": "You are not Logged in",
  "report": "accountLoggedOut"
}
```
...


