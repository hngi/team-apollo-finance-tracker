# Backend  API Documentation

if <code>error  </code> value is 1 that means error occur and the error message can be gotten using the errorMessage index

else if its 0 that means no error occured and operation is successfull so the success message can be 
gotten from successMessage


## link_to_route/route.php/register POST Request
<br>

#### POST VARIABLE : fullname,confirm,email,password

###### Onsuccessfull registration

...
```json
{
  "error": 0,
  "successMessage": "Thank you..Data has been captured in database",
  "report": "registered"
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


###### Password MisMatch

...
```json
{
  "error": 1,
  "errorMessage": "Password not matching",
  "report": "passwordMisMatch"
}
```
...



###### Password Too short

...
```json
{
  "error": 1,
  "errorMessage": "Your password is too short..8 characters minimum",
  "report": "passwordTooShort"
}
```
...


 
