@echo off  
  echo Uploading/Pushing YOUR fork of HBO-ICTMemes. . .
  echo.
  echo ------------------------------------------
    cd "..\..\"
    git add .
    set /p push-name="Enter comment for your fork: "
    git commit -m "%push-name%"
    git push origin develop
  echo ------------------------------------------
  echo.
pause
exit