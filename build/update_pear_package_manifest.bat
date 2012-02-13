SET HOME=\home

SET MESSAGE=Automatic checkin
SET STREAM=devel
SET APISTREAM=devel
SET BUILD=
SET BRANCH=master

IF NOT (%1)==("") SET MESSAGE=%1
IF NOT (%2)==("") SET STREAM=%2
IF NOT (%3)==("") SET APISTREAM=%3
IF NOT (%4)==("") SET BUILD=%4


IF (%STREAM%)==("devel") SET BRANCH=dev


REM Create Directories
IF NOT EXIST E:\checkout mkdir E:\checkout
IF NOT ERRORLEVEL 0 GOTO ReportError

IF NOT EXIST E:\checkout\%STREAM% mkdir E:\checkout\%STREAM%
IF NOT ERRORLEVEL 0 GOTO ReportError

PUSHD E:\checkout\%STREAM%\
IF NOT ERRORLEVEL 0 GOTO ReportError

REM Checkout if we need to
IF NOT EXIST ThumbWhere-PHP5-WebServiceLibrary "C:\Program Files\Git\bin\git.exe" clone git@github.com:ThumbWhere/ThumbWhere-PHP5-WebServiceLibrary.git
IF NOT ERRORLEVEL 0 GOTO ReportError

PUSHD ThumbWhere-PHP5-WebServiceLibrary
IF NOT ERRORLEVEL 0 GOTO ReportError

REM Make sure we are up to date
"C:\Program Files\Git\bin\git.exe" pull
IF NOT ERRORLEVEL 0 GOTO ReportError

REM Make sure we have the correct branch
"C:\Program Files\Git\bin\git.exe" checkout %BRANCH%
IF NOT ERRORLEVEL 0 GOTO ReportError

POPD
IF NOT ERRORLEVEL 0 GOTO ReportError

e:\inetpub\wwwroot\ThumbWhere-Drupal7-Module\tools\DrupalUtil.exe pear ThumbWhere-PHP5-WebServiceLibrary ThumbWhere-PHP5-WebServiceLibrary\package.xml 1.1 patch %STREAM% %APISTREAM% %BUILD%
IF NOT ERRORLEVEL 0 GOTO ReportError

PUSHD ThumbWhere-PHP5-WebServiceLibrary
IF NOT ERRORLEVEL 0 GOTO ReportError

REM Add the new changes
"C:\Program Files\Git\bin\git.exe" add .
IF NOT ERRORLEVEL 0 GOTO ReportError

REM Add the new changes
"C:\Program Files\Git\bin\git.exe" commit -m "Automatic commit by %BUILD% build."
IF NOT ERRORLEVEL 0 GOTO ReportError

REM Push the new changes
"C:\Program Files\Git\bin\git.exe" push origin %BUILD%
IF NOT ERRORLEVEL 0 GOTO ReportError

POPD
IF NOT ERRORLEVEL 0 GOTO ReportError

POPD
IF NOT ERRORLEVEL 0 GOTO ReportError

@goto ReportOK
:ReportError
@echo Project error: A tool returned an error code from the build event
goto ReportNotOK
:ReportOK
@echo Completed package without errors
goto Done
:ReportKindOfOK
@echo Completed package with errors that we are pretending didn't happen.
goto Done
:ReportNotOK
@echo Completed package with errors.
@exit 1
:RollBack
@echo Rollback not possible for this
:Done
