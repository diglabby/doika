@echo off
goto :parse

:build
	docker-compose build
	goto :end

:start
	docker-compose up
	goto :end

:install
	docker exec -it app cp .env.docker .env
	docker exec -it app php artisan key:generate
	docker exec -it app php artisan storage:link
	docker exec -it app php artisan migrate --seed
	goto :end

:stop
	docker-compose stop
	goto :end

:delete
	docker-compose down
	goto :end

:parse

		if /i "%~1"=="build"        call :build
		if /i "%~1"=="start"        call :start
		if /i "%~1"=="install"     	call :install
		if /i "%~1"=="stop"     	call :stop
		if /i "%~1"=="delete"     	call :delete

:end
    exit /B
