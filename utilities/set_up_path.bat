@echo off

set myPath=%~dp0

REM this has an outdated phpunit in it
set phpPath=%myPath%..\server\xampp\php

set path=%path%;%phpPath%