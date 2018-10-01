#Ajax date validator
##Work-flow
Send a date using the form. 
A script will parse the date in correct format before it will be sent to the backend.
The Controller check if the date is correct and return a data JSON with a rendered view or errors.

##Files
###Routes
```routes/web```
###Controllers
```app/Http/PostController```
###Models
```app/Http/Post```
###Views
```
resources/views/welcome.blade
resources/views/form.blade
resources/views/message.blade
resources/views/errors.blade
```
###Tests
```tests/Unit/PostTest```

