@echo off

set myPath=%~dp0

set phpUnitPath=%myPath%../server/vendor/bin
set path=%path%;%phpUnitPath%

call "%myPath%../utilities/set_up_path.bat"
cmd.exe /k