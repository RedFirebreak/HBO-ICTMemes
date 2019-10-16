@echo off  
  echo Uploading/Pushing YOUR fork of HBO-ICTMemes. . .
  echo.
  echo ------------------------------------------
    cd "..\..\"
    git fetch upstream
    git checkout develop
    git merge upstream/develop
  echo ------------------------------------------
  echo.
pause
exit