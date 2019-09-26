# Backend  API Documentation

if <code>error  </code> value is 1 that means error occur and the error message can be gotten using the errorMessage index

else if its 0 that means no error occured and operation is successfull so the success message can be 
gotten from successMessage


## link_to_route/route.php/login POST Request
<br>
#### POST VARIABLE : email,password

###### Onsuccessfull Authentication

...
```json
{
  "error": 1,
  "errorMessage": "Either Email is Incorrect or Account Not Exists",
  "report": "accountNotExists"
}
```
...

###### Incorrect Login Details

...
```json
{
  "error": 1,
  "errorMessage": "Either Email is Incorrect or Account Not Exists",
  "report": "accountNotExists"
}
```
...


 
