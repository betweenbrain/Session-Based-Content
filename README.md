# Session Based Content Module
A Joomla content module, having an editor/WYSIWYG area, that enables you to conditionally display an instance of it based on conditions compared to values set in the user session. Originally developed to work in conjunction with the [Freegeoip Plugin](https://github.com/betweenbrain/Freegeoip-Plugin), it can be used it can be used when checking any session variable.

## Usage
Freely add the content to display in the editor/WYSIWYG area and configure as follows.

### Fallback
Set to *Yes* to make this module instance display if the configured session variable is not set in the user's session. This is also useful for when you rely on a third-party service or solution that may not be 100% reliable.

### Session Variable
The name of the session variable to check (e.g. freegeoip_zip_code).

### Session Variable Values
The values of the *Session Variable* to check for matching. This can be a comma or new line separated list of values, or a single value.  

### Inclusive
Set to inclusive if the value of the configured session variable is to be included in the values defined in the *Session Variable Values* parameter. 

For example, use *inclusive* if you define *United States* as one of the *Session Variable Values* and wish to display a module instance to users whom have the chosen session variable matching it.
 
### Exclusive
Set to exclusive to display the module instance to users when the *Session Variable* be checked is not in the values defined in the *Session Variable Values* parameter.

In the example above, using exclusive would display module instance to all users that don't match *United States*.
