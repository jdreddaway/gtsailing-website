set myPath=%~dp0

call "%myPath%../set_up_path.bat"
php composer.phar install -d "%myPath%../server"

REM Below updates packages to latest version
REM php composer.phar update

REM Below fetches packages for deployment. Before running, delete the vendor folder.
REM php composer.phar install --no-dev

pause