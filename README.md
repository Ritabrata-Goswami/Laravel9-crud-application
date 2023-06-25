# Laravel9 crud application using DB query builder
DB Facades has several methods as below: 

* DB::insert("sql query or stored procedured",[parameters])
* DB::update("sql query or stored procedured",[parameters])
* DB::delete("sql query or stored procedured",[parameters])
* DB::select("sql query or stored procedured",[parameters])

### If any query doesn't return anything unlike above methods which is normally use for crud operation, below method is use. 
* DB::statement("sql query or stored procedured",[parameters])

Query builder is use as a alternative of ORM Eloquent.
The application use session to authenticate each route.

```
$request->session()->put('session_key','session_val');
if($request->session()->has('session_key'))
{
  //if session key is set then redirect to route.
}else{
  //redirect to login page.
}
```
