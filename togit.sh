echo "Begining upload to github"
git add * 
current_date=`date +%Y%M%D%H%I%S`
current_message="commit at $current_date"
git commit -m "$current_message"
git push origin master