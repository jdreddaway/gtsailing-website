@echo off

set myPath=%~dp0
set phpUnitPath=%myPath%PHPUnit
set phpPath=%myPath%..\php

cmd.exe /k "set path=%path%;%phpUnitPath%;%phpPath%"