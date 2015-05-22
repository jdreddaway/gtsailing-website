@echo off

set myPath=%~dp0

REM this also has phpunit in it
set phpPath=%myPath%..\server\xampp\php

set path=%path%;%phpPath%