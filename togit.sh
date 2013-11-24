#!/bin/sh

current_date=`date +%Y%m%d%H%M%s`
current_message="commit at $current_date"
echo "Begining upload to github"
echo $current_message >> "commit.html"
git add * 
git add .htaccess

git commit -m "$current_message"
git push origin master


