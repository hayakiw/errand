# errand

## Development

```
$ git clone

$ cd errand/dev
$ vagrant up
```

When the virtual machine is up successfully, access to http://localhost:8080.

### gulp

```
errand-php$ gulp
```

```
errand-php$ gulp watch
```

## SSHing to web server.

```
local$ cd dev
local$ vagrant ssh
errand$ docker exec -it errand-php /bin/bash
```

Source code is at /vagrant directory.


## SSHing to mysql server.

```
local$ cd dev
local$ vagrant ssh
errand$ docker exec -it errand-mysql /bin/bash
```
