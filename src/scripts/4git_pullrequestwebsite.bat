@echo off  
  echo Uploading/Pushing YOUR fork of HBO-ICTMemes. . .
  echo.
  echo ------------------------------------------
    cd "..\..\"
    git add .
    set /p push-name="Enter comment for the PullRequest: "
    git commit -m "%push-name%"
    git push
    rem git request-pull origin/develop https://github.com/sjilderdaspam/HBO-ICTMemes.git
    git request-pull origin/develop ./
  echo ------------------------------------------
  echo.
pause
exit