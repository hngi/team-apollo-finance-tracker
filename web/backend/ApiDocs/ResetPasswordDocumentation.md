# Backend  API Documentation

if <code>error  </code> value is 1 that means error occur and the error message can be gotten using the errorMessage index

else if its 0 that means no error occured and operation is successfull so the success message can be 
gotten from successMessage


## link_to_route/route.php/reset-password POST Request
<br>
#### POST VARIABLE : submit,email

###### Onsuccessfull ResetPassword

...
```json
{
  "error": 0,
  "successMessage": "Password successfully changed",
  "report": "passwordChanged"
}
```
...

###### Empty Fields

...
```json
{
  "error": 1,
  "errorMessage": "Field Cannot Be Empty",
  "report": "emptyFields"
}
```
...

...

###### UNknown Error /DB error

...
```json
{
  "error": 1,
  "errorMessage": "Error encountered while saving your details. Retry",
  "report": "unknownError"
}
```
...

